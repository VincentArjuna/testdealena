<?php

namespace App\Http\Controllers\API\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreSubmitRequest;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Store\Store;
use App\Services\Store\StoreService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StoreController extends Controller
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
        if (!empty($request->user()->store)) {
            return response()->json([
                'user' => $user,
                'store' => $user->store,
                'couriers' => $user->store->couriers,
                'message' => !empty($user->store)
                    ? 'Successfully get store data'
                    : 'Sorry you haven\'t created a store!'
            ]);
        }
        return response()->json([
            'user' => $user,
            'message' => 'Sorry you haven\'t created a store!'
        ]);
    }

    /**
     * Submit store request
     *
     * @param \App\Http\Requests\Store\StoreSubmitRequest $request
     * @param \App\Services\Store\StoreService $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubmitRequest $request, StoreService $service)
    {
        $user = $request->user();
        $store = $service->submit($request);

        return response()->json([
            'user' => $user,
            'store' => $store,
            'message' => 'Successfully save store data'
        ]);
    }

    /**
     * Generate new slug for store
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\Store\StoreService $service
     * @return \Illuminate\Http\Response
     */
    public function generateSlug(Request $request, StoreService $service)
    {
        $response['status'] = true;
        if (!empty($request->user()->store->name)) {
            $response['slug'] = $request->user()->store->name !== $request->name
                ? $service->generateSlug($request->name) : $request->user()->store->slug;
        } else {
            $response['slug'] =  $service->generateSlug($request->name);
        }
        return response()->json($response);
    }

    /**
     * View store info
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $store = Store::query()
            ->where('id', $request->id)
            ->first();
        $products = $store->products;
        $categories = ProductCategory::query()
            ->whereHas('products', function (Builder $query) use ($products) {
                $query->whereIn('id', $products->pluck('id')->toArray());
            })
            ->get();

        return response()->json(compact('store', 'products', 'categories'));
    }

    /**
     * View store products
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function viewProducts(Request $request)
    {
        $user = $request->user();
        $store = $user->store;
        $products = Product::query()
            ->where('bid_start', '<=', now())
            ->where('bid_end', '>=', now())
            ->where('store_id', $store->id)
            ->paginate(10);

        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Update store couriers
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\Store\StoreService $service
     * @return \Illuminate\Http\Response
     */
    public function updateCouriers(Request $request, StoreService $service)
    {
        $user = $request->user();
        $store = $service->submit($request);

        return response()->json([
            'user' => $user,
            'store' => $store,
            'couriers' => $store->couriers,
            'message' => 'Successfully update store couriers!'
        ]);
    }
}
