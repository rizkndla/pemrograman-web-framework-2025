<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        // index & show untuk semua user yg terautentikasi
        //$this->middleware('auth');
        // selain index/show, buat CRUD hanya untuk admin
        //$this->middleware('role:admin')->except(['index','show']);
    }

    // public function index()
    // {
    //     $products = Product::with('category')->latest()->paginate(10);
    //     return view('products.index', compact('products'));
    // }

    //download data

public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }

    public function index()
    {
        $data = Product::all();
        return view('master-data.product-master.index-product', compact('data'));
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

    // public function edit(Product $product)
    // {
    //     $categories = Category::all();
    //     return view('products.edit', compact('product','categories'));
    // }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('master-data.product-master.edit-product', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:1',
            'producer' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'unit' => $request->unit,
            'type' => $request->type,
            'information' => $request->information,
            'qty' => $request->qty,
            'producer' => $request->producer,
        ]);

        return redirect()->back()->with('success', 'Product update successfully!');
    }

    // public function update(ProductRequest $request, Product $product)
    // {
    //     $product->update($request->validated());
    //     return redirect()->route('products.index')->with('success','Produk diperbarui');
    // }

    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success','Produk dihapus');
    // }

    // === Pilih salah satu dari dua fungsi destroy di bawah ini ===

    // Versi Eloquent ORM
    // public function destroy(string $id)
    // {
    //     $data = Product::findOrFail($id);
    //     $data->delete();
    //
    //     return redirect()->back()->with('success', 'Data berhasil dihapus');
    // }

    // Versi Query Builder
    public function destroy(string $id)
    {
        // Hapus data produk berdasarkan id pakai Query Builder
        DB::table('products')->where('id', $id)->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
