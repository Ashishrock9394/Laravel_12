<?php
// app/Http/Controllers/NotificationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Notifications\TicketUpdated;
use App\Models\User;

class NotificationController extends Controller
{
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
    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return redirect('user.view-tickets', compact('tickets'))->with('success', 'Notifications marked as read.');  
     }
}
