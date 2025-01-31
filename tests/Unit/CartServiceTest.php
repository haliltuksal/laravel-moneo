<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartServiceTest extends TestCase
{
    use RefreshDatabase;

    private CartService $cartService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cartService = app(CartService::class);
    }

    public function test_can_add_item_to_cart()
    {
        $product = Product::factory()->create(['price' => 10.00]);
        $cart = Cart::factory()->create();

        $cartItem = $this->cartService->addItemToCart($cart->id, $product->id, 2);

        $this->assertEquals(2, $cartItem->quantity);
        $this->assertEquals($product->id, $cartItem->product_id);
    }

    public function test_calculate_cart_total()
    {
        $product1 = Product::factory()->create(['price' => 10.00]);
        $product2 = Product::factory()->create(['price' => 20.00]);
        $cart = Cart::factory()->create();

        $this->cartService->addItemToCart($cart->id, $product1->id, 2);
        $this->cartService->addItemToCart($cart->id, $product2->id, 1);

        $total = $this->cartService->calculateTotal($cart->id);
        $this->assertEquals(40.00, $total);
    }
}
