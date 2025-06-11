@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Daftar Keluhan</h1>
    <div class="bg-white shadow-lg rounded-xl p-6">
        @if(session('success'))
            <div class="mb-4 flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Keluhan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($keluhans as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $item->pesan }}</td>
                        <td class="px-6 py-4">{{ $item->mahasiswa->nama ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->created_at->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('keluhan.edit', $item->keluhanId) }}" class="inline-block px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('keluhan.destroy', $item->keluhanId) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada keluhan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
