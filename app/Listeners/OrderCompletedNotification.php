<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Mail\MailOrderCompleted;
use Mail;

class OrderCompletedNotification
{
    /**
     * Handle the event.
     *
     * @param \App\Events\OrderCompleted $event
     * @return void
     */
    public function handle(OrderCompleted $event)
    {
        $order = $event->order;
        $order->load('products.vendor');

        $emails = [$order->partner->email];
        foreach ($order->products as $product) {
            /** @var \App\Product product */
            $emails[] = $product->vendor->email;
        }

        foreach ($emails as $email) {
            Mail::to($email)->send(new MailOrderCompleted($order));
        }
    }
}
