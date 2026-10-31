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
        $credentials = $request->only('username', 'password');

        $captchaInput = $request->input('captcha');
        $captchaSession = session('captcha_code');

        // VULN: CAPTCHA BYPASS
        // 1. If captcha field is empty/null, validation is skipped
        // 2. CAPTCHA answer stored in plaintext in session, predictable
        // 3. Client-side captcha value can be extracted from HTML source
        if ($captchaInput !== null && $captchaInput !== '') {
            if ($captchaInput != $captchaSession) {
                return back()->with('error', 'Kode CAPTCHA salah!');
            }
        }

        if (Auth::attempt($credentials, $request->has('remember'))) {
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
        // VULN: Predictable CAPTCHA - simple math with small numbers
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $result = $num1 + $num2;
        session(['captcha_code' => $result]);
        session(['captcha_num1' => $num1]);
        session(['captcha_num2' => $num2]);

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
