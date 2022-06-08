<?php

namespace App\Services\Midtrans;

use App\Models\Product\Transaction;
use Illuminate\Support\Str;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $transaction;

    public function __construct($transaction_id)
    {
        parent::__construct();
        $transaction = Transaction::find($transaction_id);
        $this->transaction = $transaction;
    }

    public function getSnapToken()
    {
        $orderId = '';
        if (empty($this->transaction->payment_id)) {
            $orderId = 'DEA-PA-' . $this->transaction->id . '-' . Str::random(10);
            $transaction = Transaction::find($this->transaction->id);
            $transaction->payment_id = $orderId;
            $transaction->save();
        } else {
            $orderId = $this->transaction->payment_id;
        }
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => ($this->transaction->grandtotal + $this->transaction->waybill_cost + 10000),
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->transaction->subtotal,
                    'quantity' => $this->transaction->products->get('qty'),
                    'name' => $this->transaction->products->get('name'),
                ],
                [
                    'id' => 2,
                    'price' => $this->transaction->waybill_cost,
                    'quantity' => 1,
                    'name' => 'Ongkos Kirim',
                ],
                [
                    'id' => 3,
                    'price' => 10000,
                    'quantity' => 1,
                    'name' => 'Biaya Admin',
                ]
            ],
            'customer_details' => [
                'first_name' => $this->transaction->member_detail->get('first_name'),
                'last_name' => $this->transaction->member_detail->get('last_name'),
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
