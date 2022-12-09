<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserContoller extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function registerPost(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:10|max:200',
            'username' => 'required|min:5|max:200|unique:users,username|alpha_dash|not_regex:[A-Z]',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:5'
        ]);
        $validate['password'] = Hash::make($validate['password'] );
        User::create($validate);

        return redirect('/login')->with('success','Register berhasil silahkan login!');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Gagal Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
