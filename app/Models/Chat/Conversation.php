<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat\Message;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_one',
        'user_two'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }
}
