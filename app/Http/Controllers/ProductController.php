<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request): void
    {
        // TODO: Image upload

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
        ]);

        $validatedData['seller_id'] = Auth::id();

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    public function getBySellerId(int $sellerId): JsonResponse
    {
        $products = Product::where('seller_id', $sellerId)->get();
        return response()->json($products);
    }
}
