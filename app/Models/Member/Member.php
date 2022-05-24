<?php

namespace App\Models\Member;

use App\Models\Product\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['image_url', 'full_name'];

    public function getImageUrlAttribute()
    {
        return !empty($this->image)
            ? url('images/members/' . $this->image)
            : url('images/placeholder/no-user.png');
    }

    public function getFullNameAttribute()
    {
        $name = $this->first_name ? $this->first_name . ' ' : null;
        $name .= $this->middle_name ? $this->middle_name . ' ' : null;
        $name .= $this->last_name ? $this->last_name : null;

        return $name;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(MemberAddress::class, 'user_id', 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'member_id', 'id');
    }

    public function bidders()
    {
        return $this->hasMany(ProductBidder::class, 'product_id', 'id');
    }
}
