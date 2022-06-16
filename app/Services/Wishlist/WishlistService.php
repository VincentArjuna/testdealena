<?php

namespace App\Services\Wishlist;

use App\Models\Product\Wishlist;
use Illuminate\Http\Request;

class WishlistService
{
    public function show_all(Request $request)
    {
        $member_id = $request->user()->member->id;
        $wishlist = Wishlist::where('member_id', $member_id)->with(
            ['product' => function ($query) {
                $query->select('id', 'name', 'images');
            }]
        )->paginate(10);
        return $wishlist;
    }

    public function updateWishlist(Request $request)
    {
        $member_id = $request->member_id;
        $data['message'] = 'Error';
        $status = 400;
        if ($request->wishlist) {
            $find = Wishlist::where('member_id', $member_id)->where('product_id', $request->product_id)->first();
            if (!$find) {
                Wishlist::create([
                    'member_id' => $member_id,
                    'product_id' => $request->product_id
                ]);
            }
            $data['message'] = 'Success';
            $status = 200;
        } else {
            Wishlist::where('member_id', $member_id)
                ->where('product_id', $request->product_id)
                ->delete();
            $data['message'] = 'Deleted';
            $status = 200;
        }
        return response()->json($data, $status);
    }
}
