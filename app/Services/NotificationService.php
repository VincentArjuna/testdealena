<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;

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
        $member_id = $product->member_id;
        $detail = "Masa lelang produk " . $product->name . " telah berakhir!";

        Notification::create([
            'member_id' => $member_id,
            'type' => 'store',
            'category' => 'info',
            'detail' => $detail
        ]);
    }

    public function auctionBuyIn($product)
    {
        $member_id = $product->member_id;
        $detail = "Product " . $product->name . " telah di Buy In!";

        Notification::create([
            'member_id' => $member_id,
            'type' => 'store',
            'category' => 'info',
            'detail' => $detail
        ]);
    }

    public function auctionWin($product)
    {
        $member_id = $product->winner_id;
        $detail = "Anda telah memenangkan lelang " . $product->name;

        Notification::create([
            'member_id' => $member_id,
            'type' => 'member',
            'category' => 'info',
            'detail' => $detail
        ]);
    }

    public function auctionPaid()
    {
        # code...
    }
}
