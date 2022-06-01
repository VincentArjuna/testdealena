<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService
{
    public function paymentNotification()
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
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
