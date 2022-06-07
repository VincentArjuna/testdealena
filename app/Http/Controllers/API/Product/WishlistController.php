<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Wishlist;
use App\Services\Wishlist\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index(Request $request, WishlistService $service)
    {
        return response()->json([
            'data' => $service->show_all($request)
        ], 200);
    }

    public function updateWishlist(Request $request, WishlistService $service)
    {
        return $service->updateWishlist($request);
    }
}
