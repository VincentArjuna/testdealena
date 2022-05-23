<?php

namespace App\Models\Product;

use App\Models\Store\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
        'store',
        'related_products',
        'bidders'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'images' => 'collection',
        'bid_start' => 'datetime',
        'bid_end' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $appends = ['remaining_times', 'placeholder_images'];

    public function getRemainingTimesAttribute()
    {
        $remaining_times = collect();
        $days = now()->diffInDays($this->bid_end, false) < 0
            ? 0
            : now()->diffInDays($this->bid_end, false);
        $hours = now()->diffInHours($this->bid_end, false) < 0
            ? 0
            : now()->diffInHours($this->bid_end, false);
        $minutes = now()->diffInMinutes($this->bid_end, false) < 0
            ? 0
            : now()->diffInMinutes($this->bid_end, false);
        $remaining_times->put('days', $days);
        $remaining_times->put('hours', $hours);
        $remaining_times->put('minutes', $minutes);

        return $remaining_times;
    }

    public function getPlaceholderImagesAttribute()
    {
        $images = collect();
        $image_props = ['images_front', 'images_back', 'images_left', 'images_right'];
        if (empty($this->images) || $this->images->count() < 1) {
            foreach ($image_props as $image) {
                $images->push([
                    $image => 'no-product.png',
                    'path' => 'images/products/no-product.png',
                    'public_url' => url('images/placeholder/no-product.png')
                ]);
            }
        }

        return $images;
    }

    public function getHighestBidderAttribute()
    {
        return $this->bidders()
            ->orderBy('bid_value', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function related_products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'product_category_id')
            ->where('id', '!=', $this->id)
            ->limit(3);
    }

    public function bidders()
    {
        return $this->hasMany(ProductBidder::class, 'product_id', 'id');
    }
}