<?php

namespace App\Models\Chat;

use App\Models\User;
use App\Models\conversation;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'conversation_id',
        'body',
        'sender'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toAtomString();
    }


    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
