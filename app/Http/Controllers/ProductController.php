<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // index & show untuk semua user yg terautentikasi
        //$this->middleware('auth');
        // selain index/show, buat CRUD hanya untuk admin
        //$this->middleware('role:admin')->except(['index','show']);
    }

    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('master-data.product-master.create-product');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit'        => 'required|string|max:100',
            'type'        => 'required|string|max:100',
            'information' => 'nullable|string',
            'qty'         => 'required|integer|min:0',
            'producer'    => 'required|string|max:255',
        ]);

        Product::create($validatedData);

        return redirect()->route('product-create')
                         ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success','Produk diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Produk dihapus');
    }
}
