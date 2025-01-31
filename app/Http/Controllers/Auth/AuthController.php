<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        return redirect()->route('dashboard'); // Ganti dengan route yang Anda inginkan
    }
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validasi
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        // Menghindari redirect ke halaman sebelumnya jika tidak ada
        return redirect()->intended('dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
}

    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    
    }

    
}
