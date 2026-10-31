@extends('layouts.app')
@section('title', 'Cek Status Pendaftaran')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6 text-center">Cek Status Pendaftaran</h2>

    <form method="POST" action="{{ route('spmb.cek_status.submit') }}" class="mb-6">
        @csrf
        <div class="flex space-x-2">
            <input type="text" name="nik" placeholder="Masukkan NIK" class="flex-1 px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Cari</button>
        </div>
    </form>

    @if(isset($pendaftar))
    <div class="border-t pt-4">
        <h3 class="text-lg font-bold mb-4">Hasil Pencarian</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Nama</p>
                <p class="font-bold">{{ $pendaftar->nama_lengkap }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">NIK</p>
                <p class="font-bold">{{ $pendaftar->nik }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Prodi Pilihan 1</p>
                <p class="font-bold">{{ $pendaftar->pilihan_prodi_1 }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Status</p>
                <p class="font-bold">
                    @if($pendaftar->status_pendaftaran == 'menunggu')
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Menunggu</span>
                    @elseif($pendaftar->status_pendaftaran == 'diverifikasi')
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Diverifikasi</span>
                    @elseif($pendaftar->status_pendaftaran == 'diterima')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Diterima</span>
                    @else
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Ditolak</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
