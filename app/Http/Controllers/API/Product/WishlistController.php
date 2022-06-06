<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function updateWishlist(Request $request)
    {
        $member_id = $request->user()->member->id;
        $data['message'] = 'Error';
        $status = 400;
        if ($request->wishlist) {
            Wishlist::create([
                'member_id' => $member_id,
                'product_id' => $request->product_id
            ]);
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
