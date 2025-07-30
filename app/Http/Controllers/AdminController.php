<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Query;
use App\Models\Contact;
use App\Models\Attendance;
use App\Models\LeaveRequest;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $adminId = auth()->id(); 

        return view('admin.dashboard', [
            'userCount' => User::where('parent_id', $adminId)->count(),
            'ticketCount' => Ticket::where('assigned_to', $adminId)->count(),
            'queryCount' => Query::where('admin_id', $adminId)->count(),
            'attendanceCount' => Attendance::whereIn('user_id', function ($query) use ($adminId) {
                $query->select('id')
                    ->from('users')
                    ->where('parent_id', $adminId);
            })->count(),
            'leaveCount' => LeaveRequest::whereIn('user_id', function ($query) use ($adminId) {
                $query->select('id')
                    ->from('users')
                    ->where('parent_id', $adminId)                 
                    ->where('status', 'pending');;
            })->count(),
            // Assuming contacts are related to users under the admin
            'contactCount' => Contact::whereIn('user_id', function ($query) use ($adminId) {
                $query->select('id')
                    ->from('users')
                    ->where('parent_id', $adminId);
            })->count(),
        ]);
    }
    public function users()
    {
        return view('admin.users');
    }
    public function tickets()
    {
        return view('admin.tickets');
    }
    public function queries()
    {
        return view('admin.queries');
    }   
    public function contacts()
    {
        return view('admin.contacts');
    }
    public function leaveRequests()
    {
        return view('admin.leave-requests');
    }
    
}
