<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Kategori;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required|min:5|max:80',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName=$request->file('foto')->getClientOriginalName();
        if($request->file('foto')){
            $path = public_path().'/fotos';
            $upload = $request->file('foto')->move($path,$fileName);
        }
       
        $slug=Str::slug($request->nama);

        $product=Product::create([
            'slug' => $slug,
            'kategori_id'=>$request->kategori_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => 'fotos/'.$fileName
        ]);

        return redirect()->route('product.index');
    }

    public function show ($slug){
        $product=Product::where('slug',$slug)->first();
        
        if(is_null ($product)){
            return view('product.index');
        }

        return view('product.show', compact('product'));
    }

    public function edit($slug){
        $product = Product::where('slug',$slug)->first();
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $slug){
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required|min:5|max:80',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName=$request->file('foto')->getClientOriginalName();
        if($request->file('foto')){
            $path = public_path().'/fotos';
            $upload = $request->file('foto')->move($path,$fileName);
        }

        $product = Product::where('slug',$slug)->first();
        $slug=Str::slug($request->nama);
        $product->update([
            'slug' => $slug,
            'kategori_id'=>$request->kategori_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => 'fotos/'.$fileName
        ]);
        
        return redirect()->route('product.index');
    }

    public function delete($slug){
        $product = Product::where('slug',$slug)->first();
        $product->delete();
        return redirect()->route('product.index');
    }

}