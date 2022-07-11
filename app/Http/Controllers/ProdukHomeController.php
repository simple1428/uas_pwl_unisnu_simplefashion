<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Regency;
use App\Models\Village;
use App\Models\Category;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class ProdukHomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Produk',
            'produk' => Produk::all(),
            'category' =>Category::all(),
        ];
        return view('home.pages.produk',$data);
    } 
    public function produkcategory(Category $category)
    {
        $data = [
            'title' => 'Produk',
            'produk' => Produk::where('category_id',$category->id)->get(),
            'category' =>Category::all(),
        ];
        return view('home.pages.produkcategory',$data);
    }
    public function keranjang()
    {
        $data = [
            'title' => 'Cart',
            'cart' => Cart::where('status','cart')->get(),
            'produks' => Produk::all()
        ]; 
        return view('home.pages.cart',$data);
    }

    public function show(Produk $produk)
    {
        $data = [
            'title' => 'Produk',
            'produk' => $produk,
            'produks' => Produk::where('id', '!=', $produk->id)->take(4)->get(),
        ];

        return view('home.pages.detailproduk',$data);
    } 
    public function pesanan()
    { 
        $data=[
            'title' => 'Cart',
            'provinces' => Province::all(),
            'cart' => Cart::where('status','cart')->get(),
        ]; 
        return view('home.pages.pesanan',$data);
    }
    public function order()
    { 
        $data=[ 
            'title' => 'Order',
            'order1' =>Order::where('status','pesanan-baru')->where('user_id',auth()->user()->id)->get(),
            'order2' =>Order::where('status','pesanan-diproses')->where('user_id',auth()->user()->id)->get(),
            'order3' =>Order::where('status','pesanan-dikirim')->where('user_id',auth()->user()->id)->get(),
            'order4' =>Order::where('status','pesanan-selesai')->where('user_id',auth()->user()->id)->get(),
            'order5' =>Order::where('status','pesanan-dibatalkan')->where('user_id',auth()->user()->id)->get(), 
            'produks' => Produk::all()
        ];   
        return view('home.pages.order',$data);
    }
    public function cekout(Request $request)
    {   
        $provinsi = Province::where('id',$request->provinsi)->first();
        $kabupaten = Regency::where('id',$request->kabupaten)->first();
        $kecamatan = District::where('id',$request->kecamatan)->first();
        $desa = Village::where('id',$request->desa)->first();

        $data = $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'no_invoice' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'ongkir' => 'required',
            'pembayaran'=> 'required', 
            'jumlah' => 'required',
        ]); 
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'pesanan-baru';
        $data['provinsi'] = $provinsi->name;
        $data['kabupaten'] = $kabupaten->name;
        $data['kecamatan'] = $kecamatan->name;
        $data['desa'] = $desa->name;

        $data2 = [
            'status' => 'konfirmasi'
        ];
        Order::create($data);   
        Cart::where('no_invoice',$request->no_invoice)->update($data2);
        return redirect('/order')->with('success','Selamat pesanan anda berhasil di konfirmasi');
    }

    public function ordercancel(Request $request, Order $order)
    {
        $data = $request->validate([ 
            'status' => 'required', 
        ]);
        Order::where('id',$request->id)->update($data);
        return redirect('/order')->with('success','Pesanan Berhasil di batalkan');
    }
    public function orderdetail($id)
    { 
        $order =  Order::where('id',$id)->first();
        $data = [
            'title' => 'Order',
            'order' => $order,
            'cart'  => Cart::where('no_invoice', $order->no_invoice)->get()
        ];
        return view('home.pages.detailorder',$data);
    }
}