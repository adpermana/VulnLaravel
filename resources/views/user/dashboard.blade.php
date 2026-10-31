@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Dashboard User</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('spmb.register') }}" class="bg-blue-500 text-white p-8 rounded-lg text-center hover:bg-blue-600">
            <p class="text-2xl font-bold mb-2">Pendaftaran SPMB</p>
            <p>Daftar sebagai mahasiswa baru</p>
        </a>
        <a href="{{ route('spmb.status') }}" class="bg-green-500 text-white p-8 rounded-lg text-center hover:bg-green-600">
            <p class="text-2xl font-bold mb-2">Status Pendaftaran</p>
            <p>Cek status pendaftaran anda</p>
        </a>
    </div>
</div>
@endsection
