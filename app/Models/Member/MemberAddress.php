<?php

namespace App\Models\Member;

use App\Models\User;
use App\Services\RajaOngkirService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['province', 'city'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getProvinceAttribute()
    {
        return (new RajaOngkirService())->getProvince($this->province_id);
    }

    public function getCityAttribute()
    {
        return (new RajaOngkirService())->getCity($this->province_id, $this->city_id);
    }

    public function getDistrictAttribute()
    {
        return (new RajaOngkirService())->getDistrict($this->city_id, $this->district_id);
    }
}