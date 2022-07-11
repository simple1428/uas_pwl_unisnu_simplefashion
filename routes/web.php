<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\ProdukHomeController; 
use Cviebrock\EloquentSluggable\Services\SlugService;



Route::get('/admin', function () {
    return view('admin.pages.dashboard');
})->middleware('admin');

Route::resource('/admin/category',CategoryController::class)->middleware('admin');
Route::resource('/admin/produk',ProdukController::class)->middleware('admin');
Route::resource('/admin/user',UserController::class)->middleware('admin');




Route::resource('/admin/order',OrderController::class)->middleware('admin');
Route::put('/admin/order/resi/{order}',[OrderController::class,'resi'])->middleware('admin');
Route::put('/admin/order/konfirm/{order}',[OrderController::class,'konfirm'])->middleware('admin');
Route::put('/admin/order/cancel/{order}',[OrderController::class,'cancel'])->middleware('admin');
Route::get('/cetakLabel/{order}', [OrderController::class,
'cetakLabel'])->name('cetakLabel');

Route::get('/register',[AuthController::class,'registerindex'])->middleware('guest');
Route::post('/register',[AuthController::class,'registerstore']) ;
Route::get('/login',[AuthController::class,'loginindex'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'loginstore']);
Route::post('/logout',[AuthController::class,'logout']);
Route::get('/logout',[AuthController::class,'logout']);


Route::resource('/', HomeController::class);
Route::resource('/produk', ProdukHomeController::class); 
Route::post('/cart',[CartController::class,'cart']); 
Route::put('updatecart/{cart}',[CartController::class,'updatecart']); 
Route::delete('/deletecart/{cart}',[CartController::class,'deletecart']); 
Route::get('/keranjang',[ProdukHomeController::class,'keranjang']); 
Route::get('/pesanan',[ProdukHomeController::class,'pesanan']);  
Route::post('/cekout',[ProdukHomeController::class,'cekout']);  
Route::get('/order',[ProdukHomeController::class,'order']);  
Route::put('/ordercancel/{cart}',[ProdukHomeController::class,'ordercancel']);  
Route::get('/orderdetail/{cart}',[ProdukHomeController::class,'orderdetail']);  


Route::get('/form',[IndoregionController::class,'index'])->name('form');  
Route::get('/getkabupaten',[IndoregionController::class,'getkabupaten'])->name('getkabupaten');  
Route::get('/getkecamatan',[IndoregionController::class,'getkecamatan'])->name('getkecamatan');  
Route::get('/getdesa',[IndoregionController::class,'getdesa'])->name('getdesa');  



Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\Category::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
});
 