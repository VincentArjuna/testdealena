<?php

namespace App\Models\Member;

use App\Models\Location\City;
use App\Models\Location\Province;
use App\Models\Location\Subdistrict;
use App\Models\User;
use App\Services\RajaOngkirService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['province', 'city', 'subdistrict'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getProvinceAttribute()
    {
        //return (new RajaOngkirService())->getProvince($this->province_id);
        return Province::where('province_id', $this->province_id)->first();
    }

    public function getCityAttribute()
    {
        //return (new RajaOngkirService())->getCity($this->province_id, $this->city_id);
        return City::where('city_id', $this->city_id)->first();
    }

    public function getSubDistrictAttribute()
    {
        //return (new RajaOngkirService())->getDistrict($this->city_id, $this->district_id);
        return Subdistrict::where('subdistrict_id', $this->subdistrict_id)->first();
    }
}
