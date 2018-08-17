<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailOrderCompleted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @param \App\Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->subject('Заказ №' . $order->id . ' завершен');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->order->load('products');

        return $this->markdown('emails.orders.comleted', [
            'order' => $this->order,
        ]);
    }
}
