<?php

namespace App\Services\Product;

use App\Models\Member\Member;
use App\Models\Product\Transaction;
use App\Models\Product\Product;

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
        $model->subtotal = $product->highest_bidder->bid_value;
        $model->save();

        return $model;
    }
}
