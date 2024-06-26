<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get ('/dashboard', function (){
    return view('dashboard');
})->middleware (['auth', 'verified'])->name ('dashboard');

Route::middleware ('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware ('auth.admin')->group(function (){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
     
});

Route::get('/kategori/create',[KategoriController::class,'create'])->name('kategori.create'); 
Route::post('/kategori',[KategoriController::class,'store'])->name('kategori.store');

Route::get('/product/create',[ProductController::class,'create'])->name('product.create'); 
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('product.show'); 
Route::get('/product/{slug}/edit', [ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{slug}', [ProductController::class,'update'])->name('product.update');
Route::delete('/product/{slug}/delete', [ProductController::class,'delete'])->name('product.delete');


Route::get('/product',[ProductController::class,'index'])->name('product.index'); 

Route::get('/faktur/create',[FakturController::class,'create'])->name('faktur.create'); 
Route::post('/faktur',[FakturController::class,'store'])->name('faktur.store');
Route::get('/faktur',[FakturController::class,'index'])->name('faktur.index');
Route::get('/faktur/{slug}',[FakturController::class,'show'])->name('faktur.show'); 

require __DIR__.'/auth.php';