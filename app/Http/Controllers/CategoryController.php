<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category;
        $categories = $category->getCategories(5);
        return view('admin.category')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->create($request);
        return redirect('admin/category')->with('success', 'New category is created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.editCategory')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->updateCategory($request);
        return redirect('/admin/category')->with('success', 'The category is updated successfully.');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect('/admin/category')->with('success', 'The category is deleted successfully.');
    }
}
