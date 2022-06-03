<?php

use App\Models\Chat\Conversation;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('conversations.{conversation_id}', function ($user, $conversation_id) {
    $conversation = Conversation::find($conversation_id);
    if($conversation->user_one == $user->id || $conversation->user_two){
        return true;
    }else{
        return false;
    }
});
