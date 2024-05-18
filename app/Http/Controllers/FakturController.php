<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Faktur;
use App\Models\Product;

class FakturController extends Controller
{
    //
    public function index(){
        $user=Auth::user();

        $fakturs=Faktur::all();
        if(!Auth::check()) {
            return redirect()-> route('faktur.create');
          }
        $fakturs=Faktur::where('user_id',$user->id)->get(); 

        return view ('faktur.index',compact('fakturs'));
    }

    public function create()
    {
        $products=Product::all();
        return view('faktur.create', compact('products'));
    }
    public function store(Request $request){
        $request->validate([
            'product_id'=>'required',
            'kuantitas' => 'required',
            'alamat_pengiriman' => 'required',
            'kode_pos' => 'required'
        ]);

        if(! Auth::check()) {
            return redirect()-> route('faktur.index');
          }

        $fakturs=Faktur::where('user_id',Auth::user()->id)->get();
        foreach($fakturs as $faktur){
            if($faktur->product_id == $request->product_id){
                $faktur->kuantitas+=$request->kuantitas;
                $faktur->save();
                return redirect()->route('faktur.index');
            }
        }
        $slug=Str::slug($request->alamat_pengiriman);

        $faktur=Faktur::create([
            'slug' => $slug,
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
            'kuantitas'=>$request->kuantitas,
            'alamat_pengiriman'=>$request->alamat_pengiriman,
            'kode_pos' => $request->kode_pos
        ]);

        return redirect()->route('faktur.index');
    }

    public function show ($slug){
        $faktur=Faktur::where('slug',$slug)->first();
        $products=Product::all();

        if(is_null ($faktur)){
            return view('faktur.index');
        }

        return view('faktur.show', compact('products','faktur'));
    }
}
