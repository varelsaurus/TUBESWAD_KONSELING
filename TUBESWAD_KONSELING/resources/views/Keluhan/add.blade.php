@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg py-8">
    <h2 class="text-2xl font-bold mb-6">Tambah Keluhan</h2>
    <form action="{{ route('keluhan.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <input type="hidden" name="mahasiswaId" value="{{ auth()->user()->mahasiswa->id ?? '1' }}">

        <div class="mb-6">
            <label for="pesan" class="block text-gray-700 text-sm font-bold mb-2">Pesan Keluhan</label>
            <textarea id="pesan" name="pesan" rows="4" required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
            <a href="{{ route('keluhan.index') }}"
                class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection