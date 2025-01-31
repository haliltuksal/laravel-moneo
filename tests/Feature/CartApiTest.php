<?php

namespace Tests\Feature;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(3);
    }

    public function test_can_create_cart()
    {
        $user = User::factory()->create();
        $response = $this->postJson('/api/cart', ['user_id' => $user->id]);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(['id']);
    }
}
