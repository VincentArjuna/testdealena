<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotification(Request $request, NotificationService $service)
    {
        $member_id = $request->user()->member->id;
        if (empty($member_id)) {
            $response['message'] = 'Member Not Found';
            throw new HttpResponseException(response()->json($response, 422));
        }

        return response()->json($service->getNotification($member_id), 200);
    }
}
