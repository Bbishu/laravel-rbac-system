<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    //   Show all products
     
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('products.index', compact('products'));
    }

    
    //   Show create form
     
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    
    //   Store product
     
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $imageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $imageName);
        }

        Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'image' => $imageName
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    
    //   Show edit form
     
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    
    //   Update product
     
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();

        $imageName = $product->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $imageName);
        }

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'image' => $imageName
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    
    //   Delete product
     
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // delete image if exists
        if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
            File::delete(public_path('uploads/products/' . $product->image));
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}