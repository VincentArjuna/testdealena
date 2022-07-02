<?php

namespace App\Services;

use App\Models\Member\Member;
use App\Models\User;
use App\Notifications\User\PasswordResetNotification;
use App\Services\Member\MemberAddressService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Add register data to user table
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
        DB::beginTransaction();
        $user = User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password'])
        ]);
        //event(new Registered($user));
        $addressService = new MemberAddressService;
        $address = $addressService->registerNew($user, $request);

        //Generate Member
        if (!empty($request->birth_date) && !empty($request->gender)) {
            $member = Member::create([
                'user_id' => $user->id,
                'first_name' => $user->name,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'image' => $request->photo_url ? $request->photo_url : null,
            ]);
        }
        DB::commit();
        Auth::attempt(['email' => $user->email, 'password' => $request['password']]);

        return [
            'user' => $user,
            'address' => $address,
            'member' => $member
        ];
    }

    /**
     * Attempt to login user
     *
     * @param mixed $request
     * @return mixed $response
     */
    public function login($request)
    {
        $response['status'] = false;
        if (!isset($request['login_id'])) {
            $request['login_id'] = $request['email'] ?? $request['phone'];
        }
        $user = User::query()->where('email', $request['login_id'])
            ->orWhere('phone', $request['login_id'])
            ->first();
        if (empty($user)) {
            $response['message'] = 'Login failed, User not found';

            throw new HttpResponseException(response()->json($response, 422));
        }
        if (!password_verify($request['password'], $user->password)) {
            $response['message'] = 'Login failed, Password not match';

            throw new HttpResponseException(response()->json($response, 422));
        }
        $auth = Auth::attempt(['email' => $user->email, 'password' => $request['password']]);
        $response['status'] = true;
        $response['user'] = $user;
        $response['auth'] = $auth;

        return $response;
    }

    /**
     * Send forgot password notification
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function sendForgotPassword(Request $request)
    {
        $user = User::query()->where('email', $request['login_id'])
            ->orWhere('phone', $request['login_id'])
            ->first();
        if (empty($user)) {
            $response['status'] = false;
            $response['message'] = 'Sorry no user found!';

            throw new HttpResponseException(response()->json($response, 422));
        }
        // Generate random token
        $token = \Illuminate\Support\Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => \Illuminate\Support\Carbon::now()
        ]);
        $reset = DB::table('password_resets')
            ->where('email', $user->email)
            ->first();
        $url = route('reset-password', ['token' => $reset->token]);
        // Send email notification
        $user->notify(new PasswordResetNotification($user));

        return ['token' => $reset->token, 'url' => $url];
    }

    /**
     * Submit user new password
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        DB::beginTransaction();
        $token = DB::table('password_resets')
            ->where('token', $request->reset_token)
            ->first();
        if (empty($token)) {
            $response['status'] = false;
            $response['message'] = 'Sorry token has been expired!';

            throw new HttpResponseException(response()->json($response, 422));
        }
        $userQuery = User::query()->where('email', $token->email);
        $user = $userQuery->first();
        $userQuery->update([
            'password' => Hash::make($request->password)
        ]);
        DB::table('password_resets')->where('email', $user->email)->delete();
        DB::commit();

        return ['user' => $user];
    }
}
