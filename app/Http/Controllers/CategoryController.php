<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    public function index()
    {
        $data = [
            'title' => 'Category',
            'category' => Category::all(),
        ];
        return view('admin.pages.category.category',$data);
    }
 
    public function create()
    {
        $data = [
            'title' => 'New Category'
        ];
        return view('admin.pages.category.createcategory',$data);
    }
 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:128', 
            'slug' => 'required|unique:categories'
        ]); 
        // return $data;   
        Category::create($data);
        return redirect('/admin/category')->with('success','added');
    } 
    public function edit(Category $category)
    {
        $data = [
        'title' => 'Edit Produk',
        'category' => $category
        ];

        return view('admin.pages.category.editcategory',$data);
    }
 
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:128', 
        ]; 

        if ($request->slug != $category->slug){
            $rules['slug'] = 'required|unique:categories';
        };

        $data = $request->validate($rules);
        Category::where('id', $category->id)->update($data);
        return redirect('/admin/category')->with('success','updated');

    } 
    public function destroy(Category $category)
    {
        $produk = Produk::where('category_id', $category->id)->get(); 
        if (count($produk) > 0){
            return back()->with('gagal','Maaf ada produk terkait dengan category '.$category->name);
        }else{
            Category::destroy($category->id);
            return back()->with('success','deleted');
        } 
    }
}