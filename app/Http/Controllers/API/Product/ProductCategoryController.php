<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberAddressRequest;
use App\Models\Member\MemberAddress;
use App\Models\Product\ProductCategory;
use App\Services\Member\MemberAddressService;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display user addresses
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::query()
            ->with('children');

        if ($request->has('id') && ! empty($request->id)) {
            $categories = $categories->whereId($request->id)
                ->first();
        } else {
            $categories = $categories->whereIsActive(true)
                ->whereNull('parent_id')
                ->get();
        }

        return response()->json(compact('categories'));
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
}
