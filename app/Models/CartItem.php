<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity'
    ];

    // Bağlı olduğu sepet
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Sepet öğesindeki ürün
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Toplam ürün tutarını hesaplayan metod
    public function getItemTotal()
    {
        return $this->product->price * $this->quantity;
    }
}
