<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($nilai)
    {
        // cek ganjil / genap
        if ($nilai % 2 == 0) {
            $pesan = "Nilai $nilai adalah Genap";
            $type = "success"; 
        } else {
            $pesan = "Nilai $nilai adalah Ganjil";
            $type = "warning"; 
        }

        return view('produk', [
            'pesan' => $pesan,
            'type'  => $type,
        ]);
    }
}