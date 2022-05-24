<?php

namespace App\Http\Controllers;

use App\Services\Midtrans\CreateSnapTokenService;

class MidtransController extends Controller
{
    public function index()
    {
        $order = [];
        $midtrans = new CreateSnapTokenService($order);
        $snapToken = $midtrans->getSnapToken();

        return $snapToken;
    }
}
