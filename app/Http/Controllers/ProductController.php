<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index-19231234-budi', compact('products'));
    }

    public function create()
    {
        return view('products.form-19231234-budi');
    }

    public function store(Request $request)
    {
        Product::create($request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]));

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.form-19231234-budi', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]));

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
