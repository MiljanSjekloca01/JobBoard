<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Form
    public function create()
    {
        return view("auth.create");
    }

    // Sign in
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credentials = $request->only("email","password");
        $remember = $request->filled("remember");

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended("/");
        }else{
            return redirect()->back()->with("error","Invalid credentials");
        }
    }

    // Sign out 
    public function destroy(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect("/");
    }
}
