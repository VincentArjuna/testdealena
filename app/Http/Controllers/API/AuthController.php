<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function checkEmail($email)
    {
        $user = User::where('email', $email)->first();
        $response = [];
        if (!empty($user)) {
            $response['status'] = false;
            $response['message'] = 'Email Has been registered!';

            throw new HttpResponseException(response()->json($response, 422));
        }
        $response['status'] = true;
        $response['message'] = 'Email is available to be registered!';
        return response()->json($response, 200);
    }

    /**
     * Index page
     */
    public function index()
    {
        return response()->json(['message' => 'Welcome to Dealena API, You need to login to access API\'s']);
    }

    /**
     * Handle user registration
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @param \App\Services\AuthService $service
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request, AuthService $service)
    {
        $model = $service->register($request);
        $token = $model['user']->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Successfully Register'
        ]);
    }

    /**
     * Handle user login
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @param \App\Services\AuthService $service
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request, AuthService $service)
    {
        $attempt = $service->login($request->validated());
        $token = $attempt['user']->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Successfully Login'
        ]);
    }

    /**
     * Handle session logout
     *
     * @param \Illuminate\Http\Request $request
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ]);
    }

    /**
     * Handle forgot password request
     *
     * @param \App\Http\Requests\ForgotPasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(ForgotPasswordRequest $request, AuthService $service)
    {
        $forgot = $service->sendForgotPassword($request);

        return response()->json([
            'status' => true,
            'reset_token' => $forgot['token'],
            'url' => $forgot['url'],
            'message' => 'Successfully send forgot password link, please check your email!'
        ]);
    }

    /**
     * Save new password for user
     *
     * @param \App\Http\Requests\ResetPasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function submitResetPassword(ResetPasswordRequest $request, AuthService $service)
    {
        $submit = $service->changePassword($request);

        return response()->json([
            'status' => true,
            'user' => $submit['user'],
            'message' => 'Successfully change password!'
        ]);
    }

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        # code...
    }
}
