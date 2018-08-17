<?php

namespace App\Events;

use App\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class OrderCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Order
     */
    public $order;

    /**
     * Create a new event instance.
     *
     * @param \App\Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
