<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect()->route('admin.home'); // Redirect jika sudah login
        }
        return view('dashboard.login');
    }

    public function auth_admin(Request $request){
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return back()->with([
            'loginError' => 'email atau Password salah',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
