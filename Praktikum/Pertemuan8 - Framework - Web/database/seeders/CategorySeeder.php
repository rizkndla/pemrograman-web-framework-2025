<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name'=>'Elektronik','description'=>'Perangkat elektronik']);
        Category::create(['name'=>'Buku','description'=>'Buku pelajaran & referensi']);
    }
}