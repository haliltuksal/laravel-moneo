<?php

namespace App\Listeners;

use App\Events\CartTotalCalculated;
use Illuminate\Contracts\Queue\ShouldQueue; // kuyruk yapısı olmadığından kuyruklama yapılmadı
use Illuminate\Support\Facades\Log;

class LogCartTotal //implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CartTotalCalculated $event)
    {
        Log::info('Sepet toplamı hesaplandı', [
            'cart_id' => $event->cart->id,
            'total' => $event->total
        ]);
    }
}
