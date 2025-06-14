@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Update Keluhan</h2>
    <form action="{{ route('keluhan.update', $keluhan->keluhanId) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1">Keluhan</label>
            <input type="text" class="block w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" id="pesan" name="pesan" value="{{ $keluhan->pesan }}" required>
        </div>
        <div>
            <label for="mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa</label>
            <input type="text" class="block w-full rounded border-gray-200 bg-gray-100 text-gray-500 shadow-sm" id="mahasiswa" value="{{ $keluhan->mahasiswa->nama ?? '-' }}" disabled>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select class="block w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" id="status" name="status" required>
                <option value="baru" {{ $keluhan->status == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ $keluhan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $keluhan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="flex space-x-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('keluhan.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
