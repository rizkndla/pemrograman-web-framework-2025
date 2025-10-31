<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    //fungsinya adalah menimpa aturan primary key
    // protected $primarykey = 'id_produk';

    protected $fillable = [
        'product_name', 
        'unit', 
        'type', 
        'information', 
        'qty', 
        'producer'
    
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}