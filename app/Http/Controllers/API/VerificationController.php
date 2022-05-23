<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __invoke(Request $request)
    {
        $response['status'] = true;
        $user = User::find($request->route('id'));

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            $response['message'] = 'Successfully verify email!';
        } else {
            $response['message'] = 'Email already verified!';
        }

        return view('verify-email', $response);
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        $response['status'] = true;
        $response['message'] = 'Verification link sent!';

        return response()->json($response);
    }
}
