@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Jadwal</h1>

    <form action="{{ route('jadwal.update', $jadwalKonseling->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="nama_mahasiswa" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama:</label>
            <input type="text" name="nama_mahasiswa" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="topik" style="display: block; font-weight: bold; margin-bottom: 5px;">Topik:</label>
            <input type="text" name="topik" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="waktu_konseling" style="display: block; font-weight: bold; margin-bottom: 5px;">Waktu Konseling:</label>
            <input type="text" name="waktu_konseling" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        </div>


        <div class="flex justify-start items-center mt-6 p-2 space-x-4">
            <a href="{{ route('jadwal.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-full hover:bg-gray-400 transition duration-300">
                Kembali
            </a>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-full hover:bg-yellow-600 transition duration-300">
                Update
            </button>
        </div>
    </form>
</div>

@endsection
