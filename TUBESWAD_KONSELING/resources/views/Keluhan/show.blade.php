@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Detail Keluhan</h1>
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="mb-4">
            <span class="font-semibold text-gray-700">Keluhan:</span>
            <span class="ml-2">{{ $keluhan->pesan }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-gray-700">Nama Mahasiswa:</span>
            <span class="ml-2">{{ $keluhan->mahasiswa->nama ?? '-' }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold text-gray-700">Tanggal:</span>
            <span class="ml-2">{{ $keluhan->created_at->format('d-m-Y') }}</span>
        </div>
        <div class="flex space-x-2 mt-6">
            <a href="{{ route('keluhan.edit', $keluhan->keluhanId) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
            <form action="{{ route('keluhan.destroy', $keluhan->keluhanId) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
            </form>
            <a href="{{ route('keluhan.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Kembali</a>
        </div>
    </div>
</div>
@endsection
