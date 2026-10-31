@extends('layouts.app')
@section('title', 'Detail Pendaftaran')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Detail Pendaftaran</h2>

    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4">
            <p class="text-sm text-gray-600">Nama Lengkap</p>
            <p class="font-bold">{{ $pendaftar->nama_lengkap }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">NIK</p>
            <p class="font-bold">{{ $pendaftar->nik }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Tempat Lahir</p>
            <p class="font-bold">{{ $pendaftar->tempat_lahir }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Tanggal Lahir</p>
            <p class="font-bold">{{ $pendaftar->tanggal_lahir }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Jenis Kelamin</p>
            <p class="font-bold">{{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">No. HP</p>
            <p class="font-bold">{{ $pendaftar->no_hp }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Email</p>
            <p class="font-bold">{{ $pendaftar->email }}</p>
        </div>
        <div class="mb-4">
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
        <div class="mb-4 col-span-2">
            <p class="text-sm text-gray-600">Alamat</p>
            <p class="font-bold">{{ $pendaftar->alamat }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Pendidikan Terakhir</p>
            <p class="font-bold">{{ $pendaftar->pendidikan_terakhir }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Asal Sekolah</p>
            <p class="font-bold">{{ $pendaftar->asal_sekolah }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Pilihan Prodi 1</p>
            <p class="font-bold">{{ $pendaftar->pilihan_prodi_1 }}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Pilihan Prodi 2</p>
            <p class="font-bold">{{ $pendaftar->pilihan_prodi_2 }}</p>
        </div>

        @if($pendaftar->foto)
        <div class="mb-4">
            <p class="text-sm text-gray-600">Foto</p>
            <img src="{{ asset($pendaftar->foto) }}" alt="Foto" class="mt-2 max-w-xs rounded">
        </div>
        @endif

        @if($pendaftar->dokumen)
        <div class="mb-4">
            <p class="text-sm text-gray-600">Dokumen</p>
            <a href="{{ asset($pendaftar->dokumen) }}" target="_blank" class="text-blue-500 hover:underline">Lihat Dokumen</a>
        </div>
        @endif

        @if($pendaftar->catatan)
        <div class="mb-4 col-span-2">
            <p class="text-sm text-gray-600">Catatan</p>
            <p class="font-bold">{{ $pendaftar->catatan }}</p>
        </div>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline">Kembali</a>
    </div>
</div>
@endsection
