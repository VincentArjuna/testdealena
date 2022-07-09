<?php

namespace App\Services;

use App\Models\Member\Member;
use App\Models\Notification;
use App\Models\Product\Product;
use App\Models\Store\Store;
use App\Models\User;
use App\Notifications\Product\AuctionClosedNotification;
use App\Notifications\Product\AuctionPaidNotification;
use App\Notifications\Product\AuctionWinNotification;

class NotificationService
{

    public function getUser($user_id)
    {
        return User::find($user_id);
    }

    public function getNotification($member_id)
    {
        $notification = Notification::where('member_id', $member_id)
            ->filter()->latest()->get();

        return $notification;
    }

    public function productOnAuction($member_id, $product)
    {
        $detail = "Lelang produk" . $product->name . " telah dimulai!";
        Notification::create([
            'member_id' => $member_id,
            'type' => 'store',
            'category' => 'info',
            'detail' => $detail
        ]);
    }

    public function auctionClosed($product)
    {
        $store = Store::find($product->store_id);
        $user = User::find($store->user_id);
        $user->notify(new AuctionClosedNotification($product->id));
        $member = Member::where('user_id', $user->id)->first();

        $detail = "Masa lelang produk \"" . strtoupper($product->name)  . "\" telah berakhir!";
        Notification::create([
            'member_id' => $member->id,
            'type' => 'store',
            'category' => 'info',
            'detail' => $detail
        ]);
    }

    public function auctionWin($product)
    {
        $store = Store::find($product->store_id);
        $user = User::find($store->user_id);
        $user->notify(new AuctionWinNotification($product->id));
        $member = Member::where('user_id', $user->id)->first();
        $detail = "Anda telah memenangkan lelang \"" .  strtoupper($product->name)  . "\"";
        Notification::create([
            'member_id' => $member->id,
            'type' => 'member',
            'category' => 'info',
            'detail' => $detail
        ]);
    }

    public function auctionPaid($transaction)
    {
        //Store
        $product = Product::find($transaction->products['id']);
        $detail = "Pembayaran untuk lelang \"" .  strtoupper($product->name)  . "\" telah diterima";

        $store = Store::find($transaction->store_id);
        $userStore = User::find($store->user_id);
        $userStore->notify(new AuctionPaidNotification($product->name, 'store'));
        $memberStore = Member::where('user_id', $userStore->id)->first();

        Notification::create([
            'member_id' => $memberStore->id,
            'type' => 'member',
            'category' => 'info',
            'detail' => $detail
        ]);

        $memberWinner = Member::find($transaction->member_id);
        $userWinner = User::find($memberWinner->user_id);
        $userWinner->notify(new AuctionPaidNotification($product->name, 'winner'));
        Notification::create([
            'member_id' => $memberWinner->id,
            'type' => 'member',
            'category' => 'info',
            'detail' => $detail
        ]);
    }
}
