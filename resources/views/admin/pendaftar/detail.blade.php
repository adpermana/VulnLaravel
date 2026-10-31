@extends('layouts.app')
@section('title', 'Detail Pendaftar')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Detail Pendaftar</h2>

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
            <p class="text-sm text-gray-600">User Pendaftar</p>
            <p class="font-bold">{{ $pendaftar->user->name ?? 'N/A' }} ({{ $pendaftar->user->username ?? 'N/A' }})</p>
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
    </div>

    <div class="border-t pt-4 mt-4">
        <h3 class="text-lg font-bold mb-4">Update Status</h3>
        <form method="POST" action="{{ route('admin.pendaftar.update-status', $pendaftar->id) }}">
            @csrf
            <div class="flex space-x-4 items-end">
                <div class="flex-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                    <select name="status_pendaftaran" class="w-full px-3 py-2 border rounded-lg">
                        <option value="diverifikasi" {{ $pendaftar->status_pendaftaran == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                        <option value="diterima" {{ $pendaftar->status_pendaftaran == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $pendaftar->status_pendaftaran == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Catatan</label>
                    <input type="text" name="catatan" value="{{ $pendaftar->catatan }}" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.pendaftar') }}" class="text-blue-500 hover:underline">Kembali</a>
    </div>
</div>
@endsection
