<?php

namespace App\Services\Midtrans;

use App\Models\Product\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;

class CallbackService extends Midtrans
{
    protected $serverKey;

    public function __construct()
    {
        parent::__construct();
        $this->serverKey = Config::$serverKey;
    }

    public function paymentNotification(Request $request)
    {
        $notif = new \Midtrans\Notification($request);

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $input = $notif->order_id . $notif->status_code . $notif->grossAmount . $this->serverKey;
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
