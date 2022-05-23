<?php

namespace App\Models\Store;

use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['image_url'];

    protected $casts = [
        'couriers' => 'collection',
    ];

    public function getImageUrlAttribute()
    {
        return ! empty($this->image)
            ? url('images/stores/' . $this->image)
            : url('images/placeholder/no-store.png');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id')
            ->where('bid_start', '<=', now())
            ->where('bid_end', '>=', now());
    }
}
