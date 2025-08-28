<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $creds = $request->only('username', 'password');
        if(Auth::attempt($creds)){
            
            return redirect()->route('home')->with('success', 'Login success');
        }
        return back()->with('error', 'Login failed');
    }

    public function home(){

        $restockNotify = Product::orderBy('stock', 'asc')->take(5)->get();

        $outOfStock = Product::where('stock', '=', '0')->get();

        return view('home', compact('restockNotify'), compact('outOfStock'));
    }

    public function logout(Request $request){
    
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/')->with('success', 'Logout success!');
    
       }
}
