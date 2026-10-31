@extends('layouts.app')
@section('title', 'Data Pendaftar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Pendaftar SPMB</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">NIK</th>
                    <th class="px-4 py-2 text-left">User</th>
                    <th class="px-4 py-2 text-left">Prodi 1</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendaftar as $index => $p)
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $p->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $p->nik }}</td>
                    <td class="px-4 py-2">{{ $p->user->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $p->pilihan_prodi_1 }}</td>
                    <td class="px-4 py-2">
                        @if($p->status_pendaftaran == 'menunggu')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Menunggu</span>
                        @elseif($p->status_pendaftaran == 'diverifikasi')
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Diverifikasi</span>
                        @elseif($p->status_pendaftaran == 'diterima')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Diterima</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.pendaftar.detail', $p->id) }}" class="text-blue-500 hover:underline mr-2">Detail</a>
                        <a href="{{ route('admin.pendaftar.edit', $p->id) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.pendaftar.delete', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
