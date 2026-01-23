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
    $request->validate([
        'login' => 'required',
        'password' => 'required'
    ]);

    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL)
        ? 'email'
        : 'username';

    if (!Auth::attempt([
        $loginType => $request->login,
        'password' => $request->password
    ])) {
        return back()->with('error', 'Username / Email atau Password salah!');
    }

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($user->role === 'user') {
        return redirect('/user');
    }

    // fallback safety
    Auth::logout();
    return back()->with('error', 'Role tidak dikenali');
}


    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
