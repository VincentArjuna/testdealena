<?php

namespace App\Models;

use App\Models\Member\Member;
use App\Models\Member\MemberAddress;
use App\Models\Product\Product;
use App\Models\Store\Store;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'addresses',
        'member',
        'store'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany(MemberAddress::class, 'user_id', 'id');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }
}
