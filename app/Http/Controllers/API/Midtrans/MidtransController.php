<?php

namespace App\Http\Controllers\API\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\Product\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\Midtrans;
use Midtrans\Config;

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

    public function checkPayment()
    {
        $midtrans = new Midtrans;
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $input = $notif->order_id . $notif->status_code . $notif->gross_amount . Config::$serverKey;
        $signature = openssl_digest($input, 'sha512');
        if ($signature == $notif->signature_key) {
            if ($transaction == 'settlement') {
                // TODO Set payment status in merchant's database to 'accepted'
                $transaction = Transaction::where('payment_id', $notif->order_id)->first();
                $transaction->status = 'processed';
                $transaction->save();
            } else if ($transaction == 'capture') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'challenge'
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'success'
                }
            } else if ($transaction == 'cancel') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'failure'
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'failure'
                }
            } else if ($transaction == 'deny') {
                // TODO Set payment status in merchant's database to 'failure'
            }
        }
    }
}
