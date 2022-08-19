<?php

namespace App\Services\Product;

use App\Models\Member\Member;
use App\Models\Product\Product;
use App\Models\Product\ProductBidder;
use App\Services\NotificationService;
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
            $response['message'] = 'Buat toko dahulu sebelum memulai lelang!';

            throw new HttpResponseException(response()->json($response, 422));
        }
        if ($store->couriers == null) {
            $response['status'] = false;
            $response['message'] = 'Tentukan Kurir yang Toko Anda sediakan!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        // Check if has id
        if (!empty($request->id)) {
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
                if (
                    $key == 'bid_start' && $request->filled('bid_start') ||
                    $key == 'bid_end' && $request->filled('bid_end')
                ) {

                    $product->{$key} = Date::parse($value)->format('Y-m-d H:i:s');
                }
                if ($key == 'bid_end_range' && $request->filled('bid_end_range')) {
                    $product->{$key} = $value;
                    /*
                    $product->bid_end = Date::parse($request->bid_start)
                        ->addDays($request->bid_end_range)
                        ->format('Y-m-d H:i:s');
                    */
                    switch ($request->bid_end_range) {
                        case '1':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(6)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '2':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(12)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '3':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(24)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '4':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(48)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '5':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(72)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '6':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(12)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '7':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(24)
                                ->format('Y-m-d H:i:s');
                            break;
                        case '8':
                            $product->bid_end = Date::parse($request->bid_start)
                                ->addHours(48)
                                ->format('Y-m-d H:i:s');
                            break;
                        default:
                            throw new HttpResponseException(response()->json([
                                'message' => 'Durasi Lelang salah!'
                            ], 422));
                            break;
                    }
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
                'product_id' => 'required|numeric',
            ],
            [],
            [
                'product_id' => 'Product Id',
                'bid_value' => 'Bid Value'
            ]
        );
        if ($validation->fails()) {
            $response['status'] = false;
            $response['errors'] = $validation->errors()->all();

            throw new HttpResponseException(response()->json($response, 422));
        }

        //Check if bidder is member
        if (empty($request->user()->member)) {
            $response['status'] = false;
            $response['message'] = 'Anda belum terdaftar sebagai member!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        // Check if bidder is product owner
        if (!empty($request->user()->store)) {
            $is_owner = Product::query()
                //->where('store_id', $request->user()->member->store->id)
                ->where('store_id', $request->user()->store->id)
                ->where('id', $request->product_id)
                ->count() > 0
                ? true
                : false;
            if ($is_owner) {
                $response['status'] = false;
                $response['message'] = 'Pemilik produk tidak boleh melakukan bid!';

                throw new HttpResponseException(response()->json($response, 422));
            }
        }

        //Check if member has enough balance to pay deposit
        $product = Product::find($request->product_id);
        if ($request->user()->member->saldo < $product->min_deposit) {
            $response['status'] = false;
            $response['message'] = 'Saldo anda kurang untuk membayar deposit!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        //Check if bid higher than start bid
        if ($request->bid_value < $product->start_bid) {
            $response['status'] = false;
            $response['message'] = 'Bid Anda kurang tinggi!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        //Check If member has already bid
        $model = ProductBidder::where('member_id', $request->user()->member->id)
            ->where('product_id', $request->product_id)->first();
        if (!$model) {
            $model = new ProductBidder();
            $model->product_id = $request->product_id;
            $model->member_id = $request->user()->member->id;
            $model->bid_value = $request->bid_value;
            $model->deposit_value = $request->deposit_value;
            $model->save();
        }else{
            $highest_bid = ProductBidder::where('product_id', $request->product_id)->orderBy('bid_value', 'desc')->first();
            if ($request->user()->member->id == $highest_bid->member_id) {
                $response['status'] = false;
                $response['message'] = 'Bid Anda Tertinggi!';

                throw new HttpResponseException(response()->json($response, 422));
            }
        }

        //End Bid if Bid Value equals Buy In Value
        if ($request->bid_value == $product->bid_bin) {
            $product->bid_end = now();
            $product->winner_id = $request->user()->id;
            $product->is_show = 0;
            $product->save();

            $model->bid_value = $request->bid_value;
            $model->save();
            $request->user()->member->update(['saldo' => $request->user()->member->saldo - $request->deposit_value]);

            //Create Transaction
            $transaction = (new TransactionService)->storeTransaction($product, $request->user()->member->id);
            $this->clearDeposit($product->id, $product->winner_id);
            //Create Notification
            $service = new NotificationService;
            $service->auctionClosed($product);
            $service->auctionWin($product, $request->user()->id);
        } else {

            //Update Bid Value of Bidder
            $model->bid_value = $request->bid_value;
            $model->save();
            $request->user()->member->update(['saldo' => $request->user()->member->saldo - $request->deposit_value]);

            $this->clearDeposit($product->id, $model->member_id);
            switch ($product->bid_end_range) {
                case '6':
                    $product->bid_end = Date::parse($product->bid_end)
                        ->addHours(12)
                        ->format('Y-m-d H:i:s');
                    $product->save();
                    break;
                case '7':
                    $product->bid_end = Date::parse($product->bid_end)
                        ->addHours(24)
                        ->format('Y-m-d H:i:s');
                    $product->save();

                    break;
                case '8':
                    $product->bid_end = Date::parse($product->bid_end)
                        ->addHours(48)
                        ->format('Y-m-d H:i:s');
                    $product->save();
                    break;
                default:
                    # code...
                    break;
            }
        }


        return $model;
    }

    public function clearDeposit($product_id, $winner_id)
    {
        $product_bidders = ProductBidder::where('product_id', $product_id)
            ->where('member_id', '!=', $winner_id)
            ->get();
        $product_bidders->each(function ($product_bidder) {
            $member = Member::find($product_bidder->member_id);
            $member->saldo = $member->saldo + $product_bidder->deposit_value;
            $member->save();
            $product_bidder->deposit_value = 0;
            $product_bidder->save();
        });
    }
}
