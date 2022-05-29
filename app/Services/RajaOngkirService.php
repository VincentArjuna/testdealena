<?php

namespace App\Services;

use App\Models\Location\City;
use App\Models\Location\Province;
use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    /**
     * Set HTTP header
     *
     * @return \Illuminate\Support\Facades\Http
     */
    public function setHeader()
    {
        return Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ]);
    }

    /**
     * Get RajaOngkir location
     *
     * @param mixed $params
     * @param string $url
     * @return mixed
     */
    public function getLocation($params, $url)
    {
        $request = $this->setHeader()->get($url, $params);
        $response = $request->collect()->toArray();
        if ($request->status() == 200) {
            $response = $response['rajaongkir']['results'];
        } else {
            $response = $response['rajaongkir']['status'];
        }

        return $response;
    }

    /**
     * Get cost calculation from RajaOngkir
     *
     * @param mixed $params
     * @return mixed
     */
    public function getCost($params)
    {
        $url = env('RAJAONGKIR_URL') . '/cost';
        $request = $this->setHeader()->post($url, $params);
        $response = $request->collect()->toArray();
        if ($request->status() == 200) {
            $response = $response['rajaongkir'];
        } else {
            $response = $response['rajaongkir']['status'];
        }

        return $response;
    }

    /**
     * Get province from RajaOngkir
     *
     * @param int $id
     * @return mixed
     */
    public function getProvince($id)
    {
        /*
        $params = [];
        if (! empty($id)) {
            $params['id'] = $id;
        }
        $url = env('RAJAONGKIR_URL') . '/province';

        return $this->getLocation($params, $url);\
        */
        if (empty($id)) {
            $province = Province::get();
            return $province;
        } else {
            $province = Province::where('province_id', $id)->first();
            return $province;
        }
    }

    /**
     * Get city from RajaOngkir
     *
     * @param int $province
     * @param int $id
     * @return mixed
     */
    public function getCity($province = null, $id = null)
    {
        /*
        $params = [];
        if (!empty($province)) {
            $params['province'] = $province;
        }
        if (!empty($id)) {
            $params['id'] = $id;
        }
        $url = env('RAJAONGKIR_URL') . '/city';

        return $this->getLocation($params, $url);
        */
        if (empty($id)) {
            $city = City::get();
            return $city;
        } else {
            $city = City::where('city_id', $id)->first();
            return $city;
        }
    }

    /**
     * Get subdistrict from RajaOngkir
     *
     * @param int $city
     * @param int $id
     * @return mixed
     */
    public function getDistrict($city = null, $id = null)
    {
        $params = [];
        if (!empty($city)) {
            $params['city'] = $city;
        }
        if (!empty($id)) {
            $params['id'] = $id;
        }
        $url = env('RAJAONGKIR_URL') . '/subdistrict';

        return $this->getLocation($params, $url);
    }

    /**
     * Get list available couriers
     *
     * @return \Illuminate\Support\Collection
     */
    public function getListCouriers()
    {
        return collect([
            ['code' => 'jne', 'label' => 'JNE'],
            ['code' => 'pos', 'label' => 'POS'],
            ['code' => 'tiki', 'label' => 'TIKI'],
            ['code' => 'rpx', 'label' => 'RPX'],
            ['code' => 'pandu', 'label' => 'PANDU'],
            ['code' => 'wahana', 'label' => 'WAHANA'],
            ['code' => 'sicepat', 'label' => 'SICEPAT'],
            ['code' => 'jnt', 'label' => 'JNT'],
            ['code' => 'pahala', 'label' => 'PAHALA'],
            ['code' => 'sap', 'label' => 'SAP'],
            ['code' => 'jet', 'label' => 'JET'],
            ['code' => 'indah', 'label' => 'INDAH'],
            ['code' => 'dse', 'label' => 'DSE'],
            ['code' => 'slis', 'label' => 'SLIS'],
            ['code' => 'first', 'label' => 'FIRST'],
            ['code' => 'ncs', 'label' => 'NCS'],
            ['code' => 'star', 'label' => 'STAR'],
            ['code' => 'ninja', 'label' => 'NINJA'],
            ['code' => 'lion', 'label' => 'LION'],
            ['code' => 'idl', 'label' => 'IDL'],
            ['code' => 'rex', 'label' => 'REX'],
            ['code' => 'ide', 'label' => 'IDE'],
            ['code' => 'sentral', 'label' => 'SENTRAL'],
            ['code' => 'anteraja', 'label' => 'ANTERAJA'],
            ['code' => 'jtl', 'label' => 'JTL']
        ]);
    }

    /**
     * Get list available couriers
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMemberCourier($request)
    {
        $store = $request->user()->store;
        $lists = [
            ['code' => 'jne', 'label' => 'JNE', 'flag' => 0],
            ['code' => 'pos', 'label' => 'POS', 'flag' => 0],
            ['code' => 'tiki', 'label' => 'TIKI', 'flag' => 0],
            ['code' => 'rpx', 'label' => 'RPX', 'flag' => 0],
            ['code' => 'pandu', 'label' => 'PANDU', 'flag' => 0],
            ['code' => 'wahana', 'label' => 'WAHANA', 'flag' => 0],
            ['code' => 'sicepat', 'label' => 'SICEPAT', 'flag' => 0],
            ['code' => 'jnt', 'label' => 'JNT', 'flag' => 0],
            ['code' => 'pahala', 'label' => 'PAHALA', 'flag' => 0],
            ['code' => 'sap', 'label' => 'SAP', 'flag' => 0],
            ['code' => 'jet', 'label' => 'JET', 'flag' => 0],
            ['code' => 'indah', 'label' => 'INDAH', 'flag' => 0],
            ['code' => 'dse', 'label' => 'DSE', 'flag' => 0],
            ['code' => 'slis', 'label' => 'SLIS', 'flag' => 0],
            ['code' => 'first', 'label' => 'FIRST', 'flag' => 0],
            ['code' => 'ncs', 'label' => 'NCS', 'flag' => 0],
            ['code' => 'star', 'label' => 'STAR', 'flag' => 0],
            ['code' => 'ninja', 'label' => 'NINJA'], 'flag' => 0,
            ['code' => 'lion', 'label' => 'LION', 'flag' => 0],
            ['code' => 'idl', 'label' => 'IDL', 'flag' => 0],
            ['code' => 'rex', 'label' => 'REX', 'flag' => 0],
            ['code' => 'ide', 'label' => 'IDE', 'flag' => 0],
            ['code' => 'sentral', 'label' => 'SENTRAL', 'flag' => 0],
            ['code' => 'anteraja', 'label' => 'ANTERAJA', 'flag' => 0],
            ['code' => 'jtl', 'label' => 'JTL', 'flag' => 0]
        ];
        foreach ($lists as $list) {
            $code = strval($list['code']);
            $pos = strpos($store->couriers, $code);
            if ($pos != false) {
                $list['flag'] = $pos;
            }
        }
        return collect($lists);
    }
}
