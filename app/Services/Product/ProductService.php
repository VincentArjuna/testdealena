<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use App\Models\Product\ProductBidder;
use App\Services\UploadService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    /**
     * Submit changes's for member_info
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Member\MemberAddress
     */
    public function submit(Request $request)
    {
        $user = $request->user();
        $store = $user->store;
        // Check if store exist
        if (empty($store)) {
            $response['status'] = false;
            $response['message'] = 'Please create store first before submitting product!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        // Check if has id
        if (! empty($request->id)) {
            $product = Product::find($request->id);
        } else {
            $product = new Product();
        }

        // Product model setter
        $request['min_deposit'] = empty($request['min_deposit']) ? 0 : $request['min_deposit'];
        $image_props = ['images_front', 'images_back', 'images_left', 'images_right'];
        $product->user_id = $user->id;
        $product->store_id = $store->id;
        $product = $this->renderProductFromRequest($request, $product);

        // Product image model setter
        $images = collect();
        $uploadService = new UploadService();
        foreach ($image_props as $image) {
            if ($request->file($image)) {
                $uploaded = $uploadService->uploadImage($request, 'products', $image);
                $images->push([
                    $image => $uploaded,
                    'path' => 'images/products/' . $uploaded,
                    'public_url' => url('images/products/' . $uploaded)
                ]);
            }
        }
        if ($images->count() > 0) {
            $product->images = $images;
        }
        $product->save();

        return $product;
    }

    /**
     * Render product from request
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product\Product $product
     * @return \App\Models\Product\Product
     */
    public function renderProductFromRequest(Request $request, Product $product)
    {
        $image_props = ['images_front', 'images_back', 'images_left', 'images_right'];
        foreach ($request->except($image_props) as $key => $value) {
            if (in_array($key, ['bid_start', 'bid_end', 'bid_end_range'])) {
                if ($key == 'bid_start' && $request->filled('bid_start') ||
                    $key == 'bid_end' && $request->filled('bid_end')
                ) {
                    $product->{$key} = Date::parse($value)->format('Y-m-d H:i:s');
                }
                if ($key == 'bid_end_range' && $request->filled('bid_end_range')) {
                    $product->{$key} = $value;
                    $product->bid_end = Date::parse($request->bid_start)
                        ->addDays($request->bid_end_range)
                        ->format('Y-m-d H:i:s');
                }
            } else {
                $product->{$key} = $value;
            }
        }

        return $product;
    }

    /**
     * Submit product bid
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Product\ProductBidder
     */
    public function submitBid(Request $request)
    {
        // Validation
        $validation = Validator::make(
            $request->toArray(),
            [
                'bid_value' => 'required|numeric',
                'bin_value' => 'numeric'
            ],
            [],
            [
                'bid_value' => 'Bid Value',
                'bin_value' => 'BIN Value',
            ]
        );
        if ($validation->fails()) {
            $response['status'] = false;
            $response['errors'] = $validation->errors()->all();

            throw new HttpResponseException(response()->json($response, 422));
        }
        // Check if bidder is product owner
        $is_owner = Product::query()
            ->where('store_id', $request->user()->member->store->id)
            ->where('id', $request->product_id)
            ->count() > 0
                ? true
                : false;
        if ($is_owner) {
            $response['status'] = false;
            $response['message'] = 'Product owner can\'t bid on your own product!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        $model = new ProductBidder();
        $model->product_id = $request->product_id;
        $model->member_id = $request->user()->member->id;
        $model->bid_value = $request->bid_value;
        $model->deposit_value = $request->deposit_value;
        $model->save();

        return $model;
    }
}