<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Events\CartTotalCalculated;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class CartService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createCart($userId)
    {
        return Cart::create(['user_id' => $userId]);
    }

    public function addItemToCart($cartId, $productId, $quantity)
    {
        return CartItem::create([
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);
    }

    public function calculateTotal($cartId): float
    {
        $cart = Cart::with(['items.product'])->findOrFail($cartId);

        $total = 0;
        foreach ($cart->items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        CartTotalCalculated::dispatch($cart, $total);

        return $total;
    }
}
