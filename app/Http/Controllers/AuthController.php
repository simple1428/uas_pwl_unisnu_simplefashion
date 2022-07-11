<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ 
    public function registerindex()
    {
        return view('auth.register');
    }

    public function registerstore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:128',
            'no_hp' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:512', 
            'status' => 'required'
        ]);
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        $request->session()->flash('success','Registration Successfull, Please Login!!');
        return redirect('/login');


    }
    public function loginindex()
    {  
        return view('auth.login');

    }
    public function loginstore(Request $request)
    { 
        $data = $request->validate([ 
            'email' => 'required|email:dns',
            'password' => 'required ',  
        ]);
        if(Auth::attempt($data)){

            $request->session()->regenerate();
            $user = User::where('email' ,$request->email)->first();
            if($user->status == 1){

                return redirect()->intended('/admin')->with('loginsuccess','Selamat Datang '.$user->name);
            }else{
                return redirect()->intended('/');;
            }
        } else{
            return back()->with('loginerror','Login Failed');
        }


    }


    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

        
    }
}