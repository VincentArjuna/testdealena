<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $transaction;

    public function __construct($transaction)
    {
        parent::__construct();

        $this->transaction = $transaction;
    }

    public function getSnapToken()
    {
        return $this->transaction->products->keys();
        $params = [
            'transaction_details' => [
                'order_id' => $this->transaction->id,
                'gross_amount' => $this->transaction->grandtotal,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->transaction->subtotal,
                    'quantity' => $this->transaction->products->qty,
                    'name' => $this->transaction->products->name,
                ]
            ],
            'customer_details' => [
                'first_name' => $this->transaction->member_detail->first_name,
                'last_name' => $this->transaction->member_detail->last_name,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
