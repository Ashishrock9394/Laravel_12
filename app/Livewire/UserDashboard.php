<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\LeaveRequest;
use Carbon\Carbon;

class UserDashboard extends Component
{
    use WithPagination;

    public $status = 'present';
    protected $paginationTheme = 'bootstrap';

    public function markTodayAttendance()
    {
        $this->validate([
            'status' => 'required|in:present,absent,wfh,leave',
        ]);

        $userId = Auth::id();
        $today = Carbon::today()->toDateString();

        $existing = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->first();

        if ($existing) {
            $this->dispatch('swal:error', message: 'Attendance already marked for today!');
            return;
        }

        Attendance::create([
            'user_id' => $userId,
            'date' => $today,
            'status' => $this->status,
        ]);

        $this->dispatch('swal:success', message: 'Attendance marked successfully!');
        $this->reset('status');

        $this->dispatch('calendarUpdated', [
            'events' => $this->getCalendarEvents()
        ]);
    }


    public function getCalendarEvents()
    {
        $userId = Auth::id();
        $attendances = Attendance::where('user_id', $userId)
            ->orderByDesc('date')
            ->limit(30)
            ->get();

        return $attendances->map(fn($a) => [
            'title' => ucfirst($a->status),
            'start' => $a->date,
            'color' => match($a->status) {
                'present' => '#28a745',
                'wfh'     => '#17a2b8',
                'leave'   => '#ffc107',
                'absent'  => '#dc3545',
                default   => '#6c757d',
            }
        ])->toArray();
    }

    public function render()
    {
        $userId = Auth::id();

        $attendances = Attendance::where('user_id', $userId)
            ->orderByDesc('date')
            ->paginate(10);

        $leaveRequests = LeaveRequest::where('user_id', $userId)
            ->orderByDesc('start_date')
            ->paginate(5);

        $summary = [
            'working_days' => Attendance::where('user_id', $userId)->count(),
            'present_days' => Attendance::where('user_id', $userId)->where('status', 'present')->count(),
            'wfh_days'     => Attendance::where('user_id', $userId)->where('status', 'wfh')->count(),
            'leave_days'   => Attendance::where('user_id', $userId)->where('status', 'leave')->count(),
            'absent_days'  => Attendance::where('user_id', $userId)->where('status', 'absent')->count(),
        ];

        $calendarEvents = $this->getCalendarEvents();

        return view('livewire.user-dashboard', [
            'attendances' => $attendances,
            'leaveRequests' => $leaveRequests,
            'summary' => $summary,
            'calendarEvents' => $calendarEvents,
        ]);
    }
}
