<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductSubmitRequest;
use App\Models\Product\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show product
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::find($request->id);
        $product->view_count = $product->view_count + 1;
        $product->save();

        // Get list bidders
        $bidders = $product->bidders()
            ->with('member')
            ->orderBy('bid_value', 'desc')
            ->orderBy('created_at')
            ->get();

        // Check current user has_bid
        $has_bid = false;
        if ($request->filled('member_id')) {
            $has_bid = $product->bidders()
                ->where('member_id', $request->member_id)
                ->count() > 0
                ? true
                : false;
        }

        if (empty($product)) {
            $response['status'] = false;
            $response['message'] = 'Product not available!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        return response()->json([
            'product' => $product,
            'store' => $product->store,
            'bidders' => $bidders,
            'has_bid' => $has_bid,
            'related_products' => $product->related_products
        ]);
    }

    /**
     * Show all product
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $products = Product::query()
            ->where('bid_start', '<=', now())
            ->where('bid_end', '>=', now())
            ->paginate(10);

        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Submit product
     *
     * @param \App\Http\Requests\Product\ProductSubmitRequest $request
     * @param \App\Services\Product\ProductService $service
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSubmitRequest $request, ProductService $service)
    {
        $user = $request->user();
        $store = $user->store;
        $product = $service->submit($request);

        return response()->json([
            'user' => $user,
            'store' => $store,
            'product' => $product,
            'message' => 'Successfully submit product!'
        ]);
    }

    /**
     * Show products based on filter params
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $products = Product::query()
            ->where('bid_start', '>=', now())
            ->where('bid_end', '<=', now());
        foreach ($request->all() as $key => $value) {
            $column = 'product_category_id';
            $operator = '=';
            if (in_array($key, ['min_bid', 'max_bid'])) {
                $column = 'start_bid';
            } elseif (in_array($key, ['min_price', 'max_price'])) {
                $column = 'bid_bin';
            }
            if (in_array($key, ['min_bid', 'min_price'])) {
                $operator = '>=';
            } elseif (in_array($key, ['max_bid', 'max_price'])) {
                $operator = '<=';
            }
            if ($request->has($key) && $request->filled($key)) {
                $products = $products->where($column, $operator, $request->{$key});
            }
        }
        $products = $products->paginate(10);

        return response()->json(compact('products'));
    }

    /**
     * Submit product bid
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function submitBid(Request $request)
    {
        $response['status'] = true;
        $response['message'] = 'Successfully submit bid';
        $response['data'] = (new ProductService)->submitBid($request);

        return response()->json($response);
    }
}
