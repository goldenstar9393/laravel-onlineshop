<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }


    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create($request->all());

        return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    
        $category->delete();
    
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
