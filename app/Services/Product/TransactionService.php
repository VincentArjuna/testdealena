<?php

namespace App\Services\Product;

use App\Models\Member\Member;
use App\Models\Payments\Payment;
use App\Models\Product\Transaction;
use App\Models\Product\Product;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class TransactionService
{
    /**
     * Store transaction
     *
     * @param \App\Models\Product\Product $product
     * @param int $member_id
     * @return \App\Models\Product\Transaction
     */
    public function storeTransaction(Product $product, $member_id)
    {
        $store = $product->store;
        $member = Member::find($member_id);

        $model = new Transaction();
        $model->datetime = now();
        $model->member_id = $member->id;
        $model->member_detail = $member;
        $model->store_id = $store->id;
        $model->store_detail = $store;
        $model->products = $product;
        $model->subtotal = $product->highest_bidder->bid_value - $product->min_deposit;
        $model->grandtotal = $product->highest_bidder->bid_value - $product->min_deposit;
        $model->save();

        return $model;
    }

    /**
     * Add waybill cost
     * adn update grandtotal
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Product\Transaction
     */
    public function addWayBillCost(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->waybill_cost = $request->waybill_cost;
        $transaction->grandtotal = $transaction->subtotal + $request->waybill_cost;
        $transaction->save();

        return $transaction;
    }

    public function addWayBillNumber(Request $request)
    {
        $transaction = Transaction::find($request->id);
        if (empty($transaction)) {
            $response['status'] = false;
            $response['message'] = 'Transaksi tidak ditemukan!';

            throw new HttpResponseException(response()->json($response, 422));
        }
        $transaction->waybill_number = $request->waybill_number;
        $transaction->status = "on_delivery";
        $transaction->save();

        return $transaction;
    }

    public function completeTransaction(Transaction $transaction)
    {
        $transaction->status = "completed";
        $transaction->save();
        $user_id = $transaction->store_detail['user_id'];
        $deposit_value = $transaction->products['min_deposit'];
        $member = Member::where('user_id', $user_id)->first();
        $member->saldo += $transaction->grandtotal + $deposit_value - 5000;
        $member->save();
        $payment = Payment::create([
            'member_id' => $member->id,
            'member_detail' => $member,
            'amount' => $transaction->grandtotal + $deposit_value,
            'type' => 'Payout',
            'status' => 'Processed',
        ]);
        return $transaction;
    }
}
