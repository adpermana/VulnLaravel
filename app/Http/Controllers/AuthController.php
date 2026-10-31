<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required',
        ]);

        $attempts = (int) session('captcha_attempts', 0);
        if ($attempts >= 5) {
            session(['captcha_hash' => null]);
            return back()->with('error', 'Terlalu banyak percobaan CAPTCHA. Silakan muat ulang halaman.');
        }

        $captchaInput = $request->input('captcha');
        $captchaHash = session('captcha_hash');
        $salt = config('app.key');

        if (!$captchaHash || !hash_equals($captchaHash, hash('sha256', $captchaInput . $salt))) {
            session(['captcha_attempts' => $attempts + 1]);
            return back()->with('error', 'Kode CAPTCHA salah!');
        }

        // CAPTCHA valid - invalidasi agar tidak bisa digunakan kembali
        session(['captcha_hash' => null]);
        session(['captcha_attempts' => 0]);

        if (Auth::attempt($request->only('username', 'password'), $request->has('remember'))) {
            $user = Auth::user();

            if ($user->role === 'administrator') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function generateCaptcha()
    {
        $num1 = random_int(1, 50);
        $num2 = random_int(1, 50);
        $result = $num1 + $num2;
        $salt = config('app.key');
        session(['captcha_hash' => hash('sha256', $result . $salt)]);
        session(['captcha_num1' => $num1]);
        session(['captcha_num2' => $num2]);
        session(['captcha_attempts' => 0]);
        session(['captcha_generated_at' => now()->timestamp]);

        return response()->json([
            'num1' => $num1,
            'num2' => $num2,
        ]);
    }


    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
