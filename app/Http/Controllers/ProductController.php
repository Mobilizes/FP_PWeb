<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create() {
        $products = Product::where('seller_id', Auth::id())->get();
        return view('products.create', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Image upload

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $validatedData['seller_id'] = Auth::id();

        $product = Product::create($validatedData);

        return redirect()->route('dashboard');
    }

    public function getBySellerId(int $sellerId): JsonResponse
    {
        $products = Product::where('seller_id', $sellerId)->get();
        return response()->json($products);
    }
}
