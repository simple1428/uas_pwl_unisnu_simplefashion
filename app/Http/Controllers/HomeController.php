<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'category' => Category::all(),
            'produk' => Produk::all()->take(3),
        ]; 
        return view('home.pages.index',$data);
    }

}