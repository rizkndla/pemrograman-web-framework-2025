<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $cat = Category::first();
        Product::create([
            'name' => 'Contoh Produk 1',
            'description' => 'Deskripsi singkat',
            'price' => 50000,
            'stock' => 10,
            'category_id' => $cat->id,
        ]);
    }
}
