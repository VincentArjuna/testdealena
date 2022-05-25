<?php

namespace App\Http\Controllers;

use App\Models\Product\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;

class MidtransController extends Controller
{
    public function getToken($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $midtrans = new CreateSnapTokenService($transaction);
        $snapToken = $midtrans->getSnapToken();

        return response()->json([
            'token' => $snapToken,
            'redirect_url' => "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken,
        ]);
    }
}
