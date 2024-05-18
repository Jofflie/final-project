<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //
    public function create()
    {
        return view('kategori.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' =>'required'
        ]);

        $kategori=Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('product.create');
    }
}
