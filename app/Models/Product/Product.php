<?php

namespace App\Models\Product;

use App\Models\Store\Store;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Product extends Model
{
    use HasFactory, SoftDeletes, FilterQueryString;

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

    protected $filters = [
        'like',
        'product_category_id',
        'hot_product',
        'best_product',
        'last_second',
        'store_city',
    ];

    protected $appends = ['remaining_times', 'placeholder_images', 'last_bid'];

    //Extra Attributes

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

    public function getLastBidAttribute()
    {
        $bidders = $this->bidders()
            ->orderBy('bid_value', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();
        $bid_value = $this->start_bid;
        if ($bidders) {
            $bid_value = $bidders->bid_value;
        }
        return $bid_value;
    }

    public function getHighestBidderAttribute()
    {
        return $this->bidders()
            ->orderBy('bid_value', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();
    }
    public function getTransactionIdAttribute()
    {
        $transaction = Transaction::where('products', 'like', '%\"id\":' . $this->id . '%')->first();
        return $transaction->id;
    }

    public function getTransactionStatusAttribute()
    {
        $transaction = Transaction::where('products', 'like', '%\"id\":' . $this->id . '%')->first();
        return $transaction->status;
    }

    //Relation

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
            ->where('bid_start', '<=', now())
            ->where('bid_end', '>=', now())
            ->where('id', '!=', $this->id)
            ->inRandomOrder()
            ->limit(3);
    }

    public function bidders()
    {
        return $this->hasMany(ProductBidder::class, 'product_id', 'id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

    public function memberWishlist($member_id)
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id')
            ->where('member_id', $member_id)->first();
    }

    //Filters
    public function best_product($query, $value)
    {
        if ($value) {
            return $query->withCount('wishlist')->orderBy('wishlist_count', 'desc');
        }
    }

    public function hot_product($query, $value)
    {
        if ($value) {
            return $query->withCount('bidders')->orderBy('bidders_count', 'desc');
        }
    }

    public function last_second($query, $value)
    {
        if ($value) {
            $minus = Carbon::now()->subHour();
            $plus = Carbon::now()->addHour();
            return $query->whereBetween('bid_end', [$minus, $plus]);
        }
    }

    public function store_city($query, $value)
    {
        $store = Store::where('city_id', $value)->get()->pluck('id');
        return $query->whereIn('store_id', $store);
    }
}
