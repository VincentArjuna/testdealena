<?php

namespace App\Notifications\Product;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuctionPaidNotification extends Notification
{
    use Queueable;
    public $product_name;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product_name, $type)
    {
        $this->product_name = $product_name;
        $this->type = $type;
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
        $detail = "Pembayaran untuk lelang \"" .  strtoupper($this->product->name)  . "\" telah diterima";

        if ($this->type == 'store') {
            return (new MailMessage)
                ->greeting('Perhatian!')
                ->line($detail)
                ->line('Dimohon untuk segera melakukan pengiriman.')
                ->line('Jangan lupa untuk masukkan Nomor Resi pada produk anda agar dapat melanjutkan proses.');
        } else {
            return (new MailMessage)
                ->greeting('Perhatian!')
                ->line($detail)
                ->line('Pengiriman sedang diproses oleh pihak toko.');
        }
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
