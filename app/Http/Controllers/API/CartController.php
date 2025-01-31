<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddItemRequest;
use App\Http\Requests\CartStoreRequest;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(CartStoreRequest $request): JsonResponse
    {
        $cart = $this->cartService->createCart($request->validated('user_id'));
        return response()->json($cart, Response::HTTP_CREATED);
    }

    public function addItem(AddItemRequest $request, $cartId): JsonResponse
    {
        $cartItem = $this->cartService->addItemToCart(
            $cartId,
            $request->validated('product_id'),
            $request->validated('product_id')
        );

        return response()->json($cartItem, Response::HTTP_CREATED);
    }

    public function getTotal($cartId): JsonResponse
    {
        $total = $this->cartService->calculateTotal($cartId);
        return response()->json(['total' => $total]);
    }
}
