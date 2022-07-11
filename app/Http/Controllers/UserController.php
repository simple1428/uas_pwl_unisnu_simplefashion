<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{ 
    public function index()
    {
        $data = [
            'title' => 'Profile',
            'user' => User::where('id', auth()->user()->id)->first(),
        ];

        return view('admin.pages.user.user',$data);
    } 
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|max:128',
            'no_hp' => 'required',
            'provinsi'=>'required',
            'kabupaten'=>'required',
            'kecamatan'=>'required',
            'alamat'=>'required',
            'image' => 'image|file|max:1024',

        ]);     

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('profile-images');
        }

        User::where('id',$user->id)->update($data);

        return redirect('/admin/user')->with('success','updated');
    }

}