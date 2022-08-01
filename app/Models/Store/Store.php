<?php

namespace App\Models\Store;

use App\Models\Location\City;
use App\Models\Location\Province;
use App\Models\Location\Subdistrict;
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
        return !empty($this->image)
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

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function district()
    {
        return $this->belongsTo(Subdistrict::class, 'district_id', 'subdistrict_id');
    }
}
