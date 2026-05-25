<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    //  Show all categories

    public function index()
    {
        $categories = Category::latest()->get();

        return view('categories.index', compact('categories'));
    }

 
    //  Show create form

    public function create()
    {
        return view('categories.create');
    }


    //   Store category

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully!');
    }


    //   Show edit form

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

//  Update category

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }

    
    //  Delete category
     
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}