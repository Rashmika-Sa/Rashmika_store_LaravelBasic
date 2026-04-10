<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Shows all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Shows the Add Product form
    public function create()
    {
        return view('products.create');
    }

    // Saves the new product to database
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }
}