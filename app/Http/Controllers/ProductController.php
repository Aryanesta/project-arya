<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('/admin/product', [
            'title' => 'Product',
            'products' => Product::all(),
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:12',
            'image' => 'required',
            'description' => 'nullable',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);

        Product::create($validateData);
        
        return redirect('/admin/product')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:12',
            'image' => 'required',
            'description' => 'nullable',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);

        Product::where('id', $product->id)->update($validateData);
        
        return redirect('/admin/product')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        
        return redirect('/admin/product')->with('success', 'Product deleted successfully!');
    }
}
