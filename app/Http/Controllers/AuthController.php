<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
       // halaman login
    public function loginPage()
    {
        return view('auth.login');
    }

    // halaman register
    public function registerPage()
    {
        return view('auth.register');
    }

    // proses register
    public function register(Request $request)
    {
    $request->validate([
        'name'     => 'required|string|max:255',
        'username' => 'required|string|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:8'
    ], [
        'password.min' => 'Password minimal 8 karakter!'
    ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user'
        ]);

        return redirect('/login')->with('success','Register berhasil');
    }

    // proses login
    public function login(Request $request)
    {
        $login = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        if(Auth::attempt([$login => $request->login, 'password'=>$request->password])){
            $role = Auth::user()->role;

            if($role == 'admin') return redirect('/admin/dashboard');
            return redirect('/user');
        }

        return back()->with('error','Username / Email atau Password salah!');

    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
