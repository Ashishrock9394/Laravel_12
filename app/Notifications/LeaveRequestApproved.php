<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LeaveRequestApproved extends Notification
{
    use Queueable;

    public $leaveRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct($leaveRequest)
    {
        $this->leaveRequest = $leaveRequest;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Store notification data in the database.
     */
    public function toDatabase($notifiable): array
    {
        return [
            'type' => 'leave',
            'leave_request_id' => $this->leaveRequest->id,
            'status' => $this->leaveRequest->status,
            'message' => "Your leave request from {$this->leaveRequest->start_date} to {$this->leaveRequest->end_date} has been updated to '{$this->leaveRequest->status}'.",
            'updated_by' => auth()->user()->name,
        ];
    }
}
