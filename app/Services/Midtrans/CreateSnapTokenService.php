<?php

namespace App\Services\Midtrans;

use App\Models\Product\Transaction;
use Illuminate\Support\Str;
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
        $orderId = '';
        if (empty($this->payment_id)) {
            $orderId = 'DEA-' . $this->transaction->id . '-' . Str::random(10);
            $transaction = Transaction::find($this->transaction->id);
            $transaction->payment_id = $orderId;
            $transaction->save();
        } else {
            $orderId = $this->payment_id;
        }
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $this->transaction->grandtotal,
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
