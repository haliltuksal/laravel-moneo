<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(ProductRepository $productRepository): JsonResponse
    {
        $products = $productRepository->all();
        return response()->json($products);
    }
}
