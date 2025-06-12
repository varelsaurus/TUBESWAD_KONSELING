<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    @extends('layouts.app')

    @section('content')
    <div class="max-w-2xl mx-auto mt-10">
        <h1 class="text-xl font-bold mb-4">Tambah Jadwal Konseling</h1>

        <form action="{{ route('jadwal-konseling.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Topik</label>
                <input type="text" name="topik" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Waktu Konseling</label>
                <input type="datetime-local" name="waktu_konseling" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Tempat</label>
                <input type="text" name="tempat" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Simpan
            </button>
            <a href="{{ route('jadwal-konseling.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
    @endsection

</div>
