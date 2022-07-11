<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{ 
    public function index()
    {
        $data = [
            'title' => 'Order',
            'order1' => Order::where('status','pesanan-baru')->get(),
            'order2' =>  Order::where('status','pesanan-diproses')->get(),
            'order3' =>  Order::where('status','pesanan-dikirim')->get(),
            'order4' =>  Order::where('status','pesanan-selesai')->get(),
            'order5' =>  Order::where('status','pesanan-dibatalkan')->get(),
        ];
        return view('admin.pages.order.order',$data);
    } 
    
    public function show(Order $order)
    {
        $data = [
            'title' => 'Detail Order',
            'order' => $order,
            'cart'  => Cart::where('no_invoice', $order->no_invoice)->get()
        ];
        return view('admin.pages.order.detailorder',$data);
    }
    public function resi(Request $request, Order $order)
    {
        $data = $request->validate([
            'no_resi' => 'required', 
            'status' => 'required', 
        ]);

        Order::where('id',$order->id)->update($data);
        return redirect('/admin/order');
    }
    public function konfirm(Request $request, Order $order)
    {
        $data = $request->validate([ 
            'status' => 'required', 
        ]);

        Order::where('id',$order->id)->update($data);
        return redirect('/admin/order')->with('success','confirm');
    }
    public function cancel(Request $request, Order $order)
    {
        $data = $request->validate([ 
            'status' => 'required', 
        ]);

        Order::where('id',$order->id)->update($data);
        return redirect('/admin/order')->with('success','canceled');
    }  

    public function cetakLabel(Order $order)
    {  
        // return $order;
        $data = [
            'order' => Order::where('id', $order->id)->first(),
            'cart' =>  Cart::where('no_invoice', $order->no_invoice)->get(),
        ]; 
            $order = Order::where('id', $order->id)->first();
            $cart =  Cart::where('no_invoice', $order->no_invoice)->get();

        return view('admin.pages.order.cetakLabel',$data);
        $pdf = PDF::loadView('admin.pages.order.cetaklabel', ['order' => $order,'cart' => $cart])->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('data_order' . time() . rand('999', '9999') . '.pdf');
    } 

}