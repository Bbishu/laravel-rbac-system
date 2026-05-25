<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    // All Products
    public function index()
{
    $products = Product::latest()->get();

    $categories = Category::all();

    return view('frontend.shop', compact('products', 'categories'));
}

public function categoryProducts($id)
{
    $categories = Category::all();

    $products = Product::where('category_id', $id)->latest()->get();

    return view('frontend.shop', compact('products', 'categories'));
}

    // Product Details
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('frontend.product-details', compact('product'));
    }
}