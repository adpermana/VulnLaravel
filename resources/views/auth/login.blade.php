@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6 text-center">Login SPMB</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Kode Captcha</label>
            <div class="flex items-center space-x-2 mb-2">
                <span id="captcha-display" class="text-lg font-bold bg-yellow-100 px-4 py-2 rounded"></span>
                <button type="button" onclick="loadCaptcha()" class="text-blue-500 text-sm">↻ Refresh</button>
            </div>
            <input type="text" name="captcha" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Masukkan hasil penjumlahan">
            <p class="text-xs text-gray-500 mt-1">Masukkan hasil penjumlahan kedua angka di atas</p>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Login</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
        Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar disini</a>
    </p>
</div>

<script>
function loadCaptcha() {
    fetch('/captcha/generate')
        .then(res => res.json())
        .then(data => {
            document.getElementById('captcha-display').innerText = data.num1 + ' + ' + data.num2 + ' = ?';
        });
}
loadCaptcha();
</script>
@endsection
