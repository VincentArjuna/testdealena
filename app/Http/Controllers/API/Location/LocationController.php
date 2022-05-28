<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\DeliveryCostRequest;
use App\Services\RajaOngkirService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Get province from location provider
     *
     * @param \App\Services\RajaOngkirService $service
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getProvince(RajaOngkirService $service, Request $request)
    {
        $id = $request->id;
        return $id;
        return response()->json($service->getProvince($id));
    }

    /**
     * Get city from location provider
     *
     * @param \App\Services\RajaOngkirService $service
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getCity(RajaOngkirService $service, Request $request)
    {
        $id = $request->id;
        $province = $request->filled('province')
            ? $request->province
            : null;

        return response()->json($service->getCity($province, $id));
    }

    /**
     * Get subdistrict from location provider
     *
     * @param \App\Services\RajaOngkirService $service
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getDistrict(RajaOngkirService $service, Request $request)
    {
        $id = $request->id;
        $city = $request->filled('city')
            ? $request->city
            : null;

        return response()->json($service->getDistrict($city, $id));
    }

    /**
     * Get cost calculation from RajaOngkir
     *
     * @param \App\Services\RajaOngkirService $service
     * @param \App\Http\Requests\Location\DeliveryCostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getCost(RajaOngkirService $service, DeliveryCostRequest $request)
    {
        $response = $service->getCost($request->validated());

        return response()->json($response);
    }

    /**
     * Get list available couriers from RajaOngkir
     *
     * @return \Illuminate\Http\Response
     */
    public function getCourier()
    {
        $response = (new RajaOngkirService)->getListCouriers()->toArray();

        return response()->json($response);
    }
}
