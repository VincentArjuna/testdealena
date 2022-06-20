<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public function getNotification($member_id)
    {
        $notification = Notification::where('member_id', $member_id)
            ->filter()->latest()->get();

        return $notification;
    }
}
