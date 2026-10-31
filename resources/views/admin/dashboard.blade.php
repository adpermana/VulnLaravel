@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Dashboard Administrator</h2>

    <div class="grid grid-cols-5 gap-4 mb-8">
        <div class="bg-blue-100 p-4 rounded-lg text-center">
            <p class="text-3xl font-bold text-blue-800">{{ $totalPendaftar }}</p>
            <p class="text-sm text-blue-600">Total Pendaftar</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg text-center">
            <p class="text-3xl font-bold text-green-800">{{ $totalUser }}</p>
            <p class="text-sm text-green-600">Total User</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg text-center">
            <p class="text-3xl font-bold text-yellow-800">{{ $menunggu }}</p>
            <p class="text-sm text-yellow-600">Menunggu</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg text-center">
            <p class="text-3xl font-bold text-green-800">{{ $diterima }}</p>
            <p class="text-sm text-green-600">Diterima</p>
        </div>
        <div class="bg-red-100 p-4 rounded-lg text-center">
            <p class="text-3xl font-bold text-red-800">{{ $ditolak }}</p>
            <p class="text-sm text-red-600">Ditolak</p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('admin.pendaftar') }}" class="bg-blue-500 text-white p-6 rounded-lg text-center hover:bg-blue-600">
            <p class="text-xl font-bold">Data Pendaftar</p>
            <p class="text-sm">Kelola data pendaftaran SPMB</p>
        </a>
        <a href="{{ route('admin.users') }}" class="bg-green-500 text-white p-6 rounded-lg text-center hover:bg-green-600">
            <p class="text-xl font-bold">Data User</p>
            <p class="text-sm">Kelola data user sistem</p>
        </a>
    </div>
</div>
@endsection
