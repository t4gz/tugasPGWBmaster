<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//uhhh
class Logincontroller extends Controller
{
    public function index() {
        return view ('master.login');
    }

    public function authenticate(Request $request) {
        $data = $request->validate ([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email'=>'Email yang anda masukkan salah',
        ]); 

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
