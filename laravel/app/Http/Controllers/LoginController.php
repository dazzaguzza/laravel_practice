<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('login.create');
    }

    public function store(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/items');
        }

        // login fail
        return back()->withErrors([
            'email'=>'The provide credentials do not match our records'
        ])->withInput();

    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/items');
    }
}