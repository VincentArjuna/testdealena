<?php

namespace App\Http\Controllers\API\Chat;

use App\Events\SendMessages;
use App\Http\Controllers\Controller;
use App\Models\Chat\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConversationsController extends Controller
{

    public function startSocket(Request $request)
    {
        if ($request->user()->email ==  'vincentiusmandala@gmail.com') {
            Artisan::call('websockets:serve');
            return response()->json([
                'message' => 'success'
            ], 200);
        }
        return response()->json([
            'message' => 'Bad Credentials'
        ], 400);
    }

    public function show_member_chat()
    {
        $user_id = auth()->user()->id;
        $conversations = Conversation::where('user_one', $user_id)->latest()->get();
        foreach ($conversations as $conversation) {
            $conversation->append('store');
        }
        return response()->json([
            'data' => $conversation
        ]);
    }
    public function show_store_chat()
    {
        $user_id = auth()->user()->id;
        $conversations = Conversation::where('user_two', $user_id)->latest()->get();
        foreach ($conversations as $conversation) {
            $conversation->append('member');
        }
        return response()->json([
            'data' => $conversation
        ]);
    }

    public function show(Request $request)
    {
        $user_id = $request->user()->id;
        if ($request->missing('conversation_id')) {
            $conversation = Conversation::create([
                'user_one' => $user_id,
                'user_two' => $request->target_id
            ]);
            return response()->json([
                'data' => $conversation
            ]);
        }
        $conversation = Conversation::find($request->conversation_id)->with('messages')->first();
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
            'sender' => $user_id
        ]);
        $conversation->updated_at = now();
        $conversation->save();

        //SendMessages::dispatch($message);

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
