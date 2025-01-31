<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    // Sepetteki ürünler
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    // Toplam sepet tutarını hesaplayan metod
    public function calculateTotal()
    {
        return $this->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }
}
