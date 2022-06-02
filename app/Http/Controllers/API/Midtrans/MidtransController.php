<?php

namespace App\Http\Controllers\API\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\Product\Transaction;
use App\Services\Midtrans\CallbackService;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    /**
     * Get Midtrans SnapToken
     *
     * @param integer $transaction_id
     * @return void \Illuminate\Http\Response
     */
    public function getToken($transaction_id)
    {
        $midtrans = new CreateSnapTokenService($transaction_id);
        $snapToken = $midtrans->getSnapToken();

        return response()->json([
            'token' => $snapToken,
            'redirect_url' => "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken,
        ]);
    }

    public function checkPayment(Request $request, CallbackService $notification)
    {
        $notification->paymentNotification($request);
    }
}
