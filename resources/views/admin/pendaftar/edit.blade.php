@extends('layouts.app')
@section('title', 'Edit Pendaftar')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Edit Data Pendaftar</h2>

    <form method="POST" action="{{ route('admin.pendaftar.update', $pendaftar->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $pendaftar->nama_lengkap }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                <input type="text" name="nik" value="{{ $pendaftar->nik }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ $pendaftar->tempat_lahir }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">No. HP</label>
                <input type="text" name="no_hp" value="{{ $pendaftar->no_hp }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ $pendaftar->email }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
            <textarea name="alamat" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ $pendaftar->alamat }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" class="w-full px-3 py-2 border rounded-lg">
                    <option value="SMA/SMK" {{ $pendaftar->pendidikan_terakhir == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                    <option value="D1" {{ $pendaftar->pendidikan_terakhir == 'D1' ? 'selected' : '' }}>D1</option>
                    <option value="D2" {{ $pendaftar->pendidikan_terakhir == 'D2' ? 'selected' : '' }}>D2</option>
                    <option value="D3" {{ $pendaftar->pendidikan_terakhir == 'D3' ? 'selected' : '' }}>D3</option>
                    <option value="S1" {{ $pendaftar->pendidikan_terakhir == 'S1' ? 'selected' : '' }}>S1</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" value="{{ $pendaftar->asal_sekolah }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 font-bold">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
