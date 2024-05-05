<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Faktur;

class FakturController extends Controller
{
    //
    public function index(){
        $user=Auth::user();
        $fakturs=Faktur::where('user_id',$user->id)->get();

        return view ('faktur.index',compact('fakturs'));
    }
    public function store(Request $request){
        $request->validate([
            'product_id'=>'required',
            'kuantitas' => 'required',
            'alamat_pengiriman' => 'required',
            'kode_pos' => 'required'
        ]);

        $fakturs=Faktur::where('user_id',Auth::user()->id)->get();
        foreach($fakturs as $faktur){
            if($faktur->product_id == $request->product_id){
                $faktur->kuantitas+=$request->kuantitas;
                $faktur->save();
                return redirect()->route('faktur.index');
            }
        }


        $faktur=Faktur::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
            'kuantitas'=>$request->kuantitas,
            'alamat_pengiriman'=>$request->alamat_pengiriman,
            'kode_pos' => $request->kode_pos
        ]);

        return redirect()->route('faktur.index');
    }
}
