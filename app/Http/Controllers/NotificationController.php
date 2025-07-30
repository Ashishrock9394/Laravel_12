<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\LeaveRequest;
use App\Models\User;
use App\Notifications\TicketUpdated;
use App\Notifications\LeaveRequestApproved;

class NotificationController extends Controller
{
    // ✅ Fetch last 5 unread notifications
    public function fetch()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'error' => 'User not authenticated',
            ], 401);
        }

        $notifications = $user->unreadNotifications()->take(5)->get();

        return response()->json([
            'count' => $notifications->count(),
            'notifications' => $notifications,
        ]);
    }

    // ✅ Mark all notifications as read and redirect user to view their tickets and leaves
    public function markAsRead()
    {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

        // Fetch related data if needed
        $tickets = Ticket::where('user_id', Auth::id())->get();
        $leaves = LeaveRequest::where('user_id', Auth::id())->get();

        return view('user.dashboard', compact('tickets', 'leaves'))->with('success', 'All notifications marked as read.');
    }

    // ✅ Mark individual notification as read (for clicking from dropdown)
    public function markSingleAsRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();

            switch ($notification->type) {
                case LeaveRequestApproved::class:
                    return redirect()->route('user.view-leaves')->with('success', 'Leave notification read.');

                case TicketUpdated::class:
                    return redirect()->route('user.view-tickets')->with('success', 'Ticket notification read.');
            }

            return redirect()->back()->with('info', 'Notification marked as read.');
        }

        return redirect()->back()->with('error', 'Notification not found.');
    }

}
