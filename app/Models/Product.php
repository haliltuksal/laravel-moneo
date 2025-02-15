<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    // Eğer cart_items ilişkisi gerekirse
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
