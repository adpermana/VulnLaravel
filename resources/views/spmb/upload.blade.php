@extends('layouts.app')
@section('title', 'Upload Berkas Persyaratan')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-2">Upload Berkas Persyaratan</h2>
    <p class="text-gray-500 mb-6">Unggah berkas persyaratan pendaftaran SPMB (KTP, ijazah, rapor, dan dokumen pendukung lainnya).</p>

    <form method="POST" action="{{ route('spmb.upload.store') }}" enctype="multipart/form-data" class="mb-8">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Berkas</label>
            <input type="file" name="file" class="w-full px-3 py-2 border rounded-lg" required>
            <p class="text-xs text-gray-500 mt-1">Maksimal 10MB. Format yang tidak diizinkan: .php</p>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 font-bold">
            Upload
        </button>
    </form>

    <h3 class="text-xl font-bold mb-4">Berkas Terunggah</h3>

    @if($uploads->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Berkas</th>
                        <th class="px-4 py-2 text-left">Ukuran</th>
                        <th class="px-4 py-2 text-left">Pemilik</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($uploads as $index => $upload)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $upload->original_name }}</td>
                        <td class="px-4 py-2">{{ number_format($upload->size / 1024, 1) }} KB</td>
                        <td class="px-4 py-2">{{ $upload->user->name ?? '-' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ asset($upload->path) }}" target="_blank" class="text-blue-500 hover:underline">Lihat</a>
                            <a href="{{ route('spmb.upload.delete', $upload->id) }}" class="text-red-500 hover:underline"
                               onclick="return confirm('Hapus berkas ini?')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Belum ada berkas yang diunggah.</p>
    @endif
</div>
@endsection
