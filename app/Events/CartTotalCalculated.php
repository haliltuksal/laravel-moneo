<?php

namespace App\Events;

use App\Models\Cart;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Support\Facades\Log;

class CartTotalCalculated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Cart $cart;
    public float $total;

    public function __construct(Cart $cart, $total)
    {
        $this->cart = $cart;
        $this->total = $total;
    }
}
