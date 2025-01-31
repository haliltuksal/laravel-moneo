<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private ProductRepository $productRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productRepository = app(ProductRepository::class);
    }

    public function test_can_get_all_products()
    {
        Product::factory()->count(5)->create();
        $products = $this->productRepository->all();
        $this->assertCount(5, $products);
    }

    public function test_can_create_product()
    {
        $productData = [
            'name' => 'Test Product',
            'price' => 19.99
        ];
        $this->productRepository->create($productData);
        $this->assertDatabaseHas('products', $productData);
    }
}
