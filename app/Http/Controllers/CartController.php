<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartController extends Controller
{  
    public function cart(Request $request)
    { 
        
        if(auth()->guest()){
            return redirect('/login');
        }
        
        $count = Cart::where('status','cart')->where('user_id',auth()->user()->id)->count();  
        $datafirst = Cart::where('status','cart')->where('user_id',auth()->user()->id)->first(); 
        if($count>0){ 
            $validate = [
                'status' => 'cart',
                'no_invoice' => $datafirst->no_invoice,
                'produk_id' => $request->produk_id,
                'user_id' => auth()->user()->id,
            ];
            $cart = Cart::where('status','cart')->where('produk_id',$request->produk_id)->where('user_id',auth()->user()->id)->first();
            if($cart){
                
                $qty = $cart['qty']; 
                $validate['qty'] = $qty + 1;
                
                $validate['total'] = $request->harga * $validate['qty'];
                Cart::where('produk_id', $request->produk_id)->update($validate);
                if($request->halaman === 'produk'){
                    return redirect('/produk')->with('success','Produk berhasil di tambahkan ke keranjang');
                }else{
                    return redirect('/produk/'.$request->slug)->with('success','Produk berhasil di tambahkan ke keranjang');
                }
            }else{  
                $validate['qty'] = 1;
                $validate['total'] = $request->harga ;
                Cart::create($validate);
                if($request->halaman === 'produk'){
                    return redirect('/produk')->with('success','Produk berhasil di tambahkan ke keranjang');
                }else{
                    return redirect('/produk/'.$request->slug)->with('success','Produk berhasil di tambahkan ke keranjang');
                }
            }
        }else{ 
            $invoice = 'SM-'.date('Y-m-d').'-'.Str::random(3);
            // $invoice = 'SM-'.date('Y-m-d').'-' . str_pad(($count+1),'3','0',STR_PAD_LEFT); 
            $validate = [
                'no_invoice' => $invoice,
                'user_id' => auth()->user()->id,
                'produk_id' => $request->produk_id,
                'qty' => 1,
                'status' => 'cart',
                'total' => $request->harga
            ];
            Cart::create($validate);
            if($request->halaman === 'produk'){
                return redirect('/produk')->with('success','Produk berhasil di tambahkan ke keranjang');
            }else if($request->halaman === 'detailproduk'){
                return redirect('/produk/'.$request->slug)->with('success','Produk berhasil di tambahkan ke keranjang');
            }else{
                return redirect('/keranjang')->with('success','Produk berhasil di tambahkan ke keranjang');
            }
        }
    }

    public function updatecart(Request $request,Cart $cart)
    {
        $data =[
            'qty' => $request->qty,
            'total' => $request->harga * $request->qty
        ];
        Cart::where('id', $cart->id)->update($data);
        return back()->with('success','Berhasil diubah');
    }
    public function deletecart(Cart $cart)
    {
        
        Cart::where('id', $cart->id)->delete();
        return back()->with('success','Berhasil di hapus');
    } 
}