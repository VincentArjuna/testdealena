<?php

namespace App\Notifications\Product;

use App\Models\Product\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuctionClosedNotification extends Notification
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
        $detail = "Masa lelang produk \"" . strtoupper($this->product->name)  . "\" telah berakhir!";
        if (empty($this->product->winner_id)) {
            return (new MailMessage)
                ->greeting('Attention!')
                ->line($detail)
                ->line('Lelang ditutup tanpa ada bidder.');
        }
        return (new MailMessage)
            ->greeting('Attention!')
            ->line($detail)
            ->line('Harap menunggu proses pembayaran dari pihak Pemenang.');
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
