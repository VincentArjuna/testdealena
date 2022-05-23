<?php

namespace App\Services\Member;

use App\Models\Member\MemberAddress;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class MemberAddressService
{
    /**
     * Register for new user
     *
     * @param \App\Models\User $user
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Member\MemberAddress
     */
    public function registerNew(User $user, Request $request)
    {
        $faker = Faker::create();

        return MemberAddress::create([
            'name' => 'Home',
            'user_id' => $user->id,
            'province_id' => $request['province_id'],
            'city_id' => $request['city_id'],
            'postal_code' => $request['postal_code'],
            'lat' => $faker->latitude(),
            'long' => $faker->longitude(),
            'is_default' => '1'
        ]);
    }

    /**
     * Submit member address
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Member\MemberAddress
     */
    public function submit(Request $request)
    {
        $user_id = $request->user()->id;
        // Update if address set to is_default
        if ($request->is_default) {
            MemberAddress::query()
                ->where('user_id', $user_id)
                ->update(['is_default' => '0']);
        }
        if ($request->has('id') && ! empty($request->id)) {
            $address = MemberAddress::find($request->id);
            if ($address->is_default && ! $request->is_default) {
                throw new HttpResponseException(
                    response()->json([
                        'message' => 'No default address specified!',
                        'status' => false
                    ], 422)
                );
            }
        } else {
            $address = new MemberAddress();
        }
        $address->user_id = $user_id;
        foreach ($request->all() as $key => $value) {
            if ($request->has($key) && ! empty($value)) {
                $address->{$key} = $value;
            }
        }
        $address->save();

        return $address;
    }
}
