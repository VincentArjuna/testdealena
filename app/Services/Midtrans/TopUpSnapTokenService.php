<?php

namespace App\Services\Midtrans;

use App\Models\Payments\Payment;
use Illuminate\Support\Str;
use Midtrans\Snap;

class TopUpSnapTokenService extends Midtrans
{
    protected $payment;

    public function __construct($payment_id)
    {
        parent::__construct();
        $payment = Payment::find($payment_id);
        $this->payment = $payment;
    }

    public function getSnapToken()
    {
        $orderId = '';
        if (empty($this->payment->order_id)) {
            $orderId = 'DEA-TU-' . $this->payment->id . '-' . Str::random(10);
            $payment = Payment::find($this->payment->id);
            $payment->order_id = $orderId;
            $payment->save();
        } else {
            $orderId = $this->payment->order_id;
        }
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => ($this->payment->amount + 10000),
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->payment->amount,
                    'quantity' => 1,
                    'name' => 'Top Up Saldo Dealena',
                ],
                [
                    'id' => 2,
                    'price' => 10000,
                    'quantity' => 1,
                    'name' => 'Biaya Admin',
                ]
            ],
            'customer_details' => [
                'first_name' => $this->payment->member_detail->get('first_name'),
                'last_name' => $this->payment->member_detail->get('last_name'),
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
