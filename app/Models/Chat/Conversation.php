<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat\Message;
use App\Models\Member\Member;
use App\Models\Store\Store;
use App\Models\User;

class Conversation extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at'];


    protected $fillable = [
        'user_one',
        'user_two',
        'updated_at'
    ];

    protected $appends = [
        'last_message'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id')->oldest();
    }

    public function user_ones()
    {
        return $this->belongsTo(User::class, 'user_one', 'id');
    }

    public function user_twos()
    {
        return $this->belongsTo(User::class, 'user_two', 'id');
    }

    public function getMemberAttribute()
    {
        return Member::where('user_id', $this->user_one)->first();
    }

    public function getStoreAttribute()
    {
        return Store::where('user_id', $this->user_two)->first();
    }

    public function getLastMessageAttribute()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id')->latest()->first();
    }
}
