<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberAddressRequest;
use App\Models\Member\MemberAddress;
use App\Services\Member\MemberAddressService;
use Illuminate\Http\Request;

class MemberAddressController extends Controller
{
    /**
     * Display user addresses
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'user' => $user,
            'addresses' => $user->addresses
        ]);
    }

    /**
     * Show user address
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = MemberAddress::find($id);

        return response()->json([
            'address' => $address
        ]);
    }

    /**
     * Add address to member
     *
     * @param \App\Http\Requests\Member\MemberAddressRequest $request
     * @param \App\Services\Member\MemberAddressService $service
     * @return \Illuminate\Http\Response
     */
    public function store(MemberAddressRequest $request, MemberAddressService $service)
    {
        $user = $request->user();
        $address = $service->submit($request);

        return response()->json([
            'user' => $user,
            'address' => $address,
            'message' => 'Successfully Submit Member Address'
        ]);
    }

    public function delete($id, MemberAddressService $service)
    {
        $service->delete($id);

        return response()->json([
            'code' => 200,
            'message' => 'Successfully Delete Member Address'
        ]);
    }
}
