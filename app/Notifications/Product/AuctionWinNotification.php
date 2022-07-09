<?php

namespace App\Notifications\Product;

use App\Models\Product\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuctionWinNotification extends Notification
{
    use Queueable;

    public $product;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product_id)
    {
        $this->product = Product::find($product_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $detail = "Anda telah memenangkan lelang " . $this->product->name;
        return (new MailMessage)
            ->greeting('Selamat!')
            ->line($detail)
            ->line('Harap periksa riwayat transaksi anda untuk melakukan pembayaran.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
