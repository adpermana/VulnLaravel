@extends('layouts.app')
@section('title', 'Status Pendaftaran')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Status Pendaftaran SPMB</h2>

    @if(isset($pendaftar) && count($pendaftar) > 0)
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">NIK</th>
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
                        <td class="px-4 py-2">{{ $p->pilihan_prodi_1 }}</td>
                        <td class="px-4 py-2">
                            @if($p->status_pendaftaran == 'menunggu')
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Menunggu</span>
                            @elseif($p->status_pendaftaran == 'diverifikasi')
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Diverifikasi</span>
                            @elseif($p->status_pendaftaran == 'diterima')
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Diterima</span>
                            @elseif($p->status_pendaftaran == 'ditolak')
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('spmb.detail', $p->id) }}" class="text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Belum ada data pendaftaran.</p>
    @endif
</div>
@endsection
