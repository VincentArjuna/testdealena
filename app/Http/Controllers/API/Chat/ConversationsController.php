<?php

namespace App\Http\Controllers\API\Chat;

use App\Events\SendMessages;
use App\Http\Controllers\Controller;
use App\Models\Chat\Conversation;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function show($user_two)
    {
        $user_one = auth()->user()->id;
        $conversation = Conversation::where(function ($query) use ($user_one, $user_two) {
            $query->where(['user_one' => $user_one, 'user_two' => $user_two]);
        })->orWhere(function ($query) use ($user_one, $user_two) {
            $query->where(['user_one' => $user_two, 'user_two' => $user_one]);
        })->with('messages')->first();

        if (empty($conversation)) {
            $conversation = Conversation::create([
                'user_one' => $user_one,
                'user_two' => $user_two
            ]);
        }
        return response()->json([
            'data' => $conversation
        ]);
    }

    public function store(Request $request, Conversation $conversation)
    {
        $user_id = auth()->user()->id;
        $message = $conversation->messages()->create([
            'conversation_id' => $conversation->id,
            'body' => $request->body,
            'user_id' => $user_id
        ]);

        SendMessages::dispatch($message);

        return response()->json([
            'code' => '200',
            'status' => 'Success',
            'data' => [
                'conversation' => $conversation,
                'message' => $message
            ]
        ]);
    }
}
