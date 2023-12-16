<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Product::query();

        $sortField = 'name';
        $sortDirection = 'asc';
        
        // Apply sorting if requested
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');
    
            $query->orderBy($sortField, $sortDirection);
        }
    
        $products = $query->paginate(10);
    
        return view('products.index', compact('products', 'sortField', 'sortDirection'));
    }


    public function add()
    {
        $categories = Category::all();

        return view('products.add', compact('categories'));
    }


    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        Product::create($request->all());

        return redirect()->back()->with('success', 'Product added successfully.');
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        return view('products.update', compact('categories', 'product'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            // Add other validation rules as needed
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Update the product with the new data
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        $product->save();
    
        return redirect('products')->with('success', 'Product updated successfully.');
    }


    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $product->delete();
    
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
