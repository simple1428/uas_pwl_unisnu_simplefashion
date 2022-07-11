<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{ 
    public function index()
    {
        $data = [
            'title' => 'Produk',
            'produk' => Produk::all(),
        ];

        return view('admin.pages.produk.produk',$data);
    } 

    public function create()
    {
        $data = [
            'title' => 'New Produk',
            'category' => Category::all(),
        ]; 

        return view('admin.pages.produk.createproduk',$data);
    } 

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:256', 
            'slug' => 'required|unique:produks',
            'category_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'image|file|max:1024',
            'imagetransparent' => 'image|file|max:1024',
            'description' => 'required',
        ]); 
        if($request->file('image')){
            $data['image'] = $request->file('image')->store('produk-images');
            $data['imagetransparent'] = $request->file('imagetransparent')->store('produk-images');

        }
        // if($request->file('imagetransparent')){
        // }

        Produk::create($data);
        return redirect('/admin/produk')->with('success','added');
    } 

    public function show(Produk $produk)
    {
        $data = [
            'title' => 'Detail Produk',
            'produk' => $produk
        ];

        return view('admin.pages.produk.detailproduk',$data);
    } 

    public function edit(Produk $produk)
    {
        $data = [
            'title' => 'Edit Category',
            'category' => Category::all(),
            'produk' => $produk

            ];
    
            return view('admin.pages.produk.editproduk',$data);
    }

    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'name' => 'required|max:256', 
            'category_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'image|file|max:1024',
            'imagetransparent' => 'image|file|max:1024',
            'description' => 'required',
        ]; 

        if ($request->slug != $produk->slug){
            $rules['slug'] = 'required|unique:categories';
        };
        

        $data = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('produk-images');
            $data['imagetransparent'] = $request->file('imagetransparent')->store('produk-images-transparent');

        } 
        Produk::where('id', $produk->id)->update($data);
        return redirect('/admin/produk')->with('success','updated');
    }
    
    public function destroy(Produk $produk)
    {
        if($produk->image){
            Storage::delete($produk->image);
        }
        Produk::destroy($produk->id);
        return redirect('/admin/produk')->with('success','deleted');
    }
}