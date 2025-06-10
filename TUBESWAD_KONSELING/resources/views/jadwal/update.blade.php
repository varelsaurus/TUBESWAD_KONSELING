<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @extends('layouts.app')

    @section('content')
    <div class="max-w-2xl mx-auto mt-10">
        <h1 class="text-xl font-bold mb-4">Edit Jadwal Konseling</h1>

        <form action="{{ route('jadwal-konseling.update', $jadwal_konseling->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" value="{{ $jadwal_konseling->nama_mahasiswa }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Topik</label>
                <input type="text" name="topik" value="{{ $jadwal_konseling->topik }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Waktu Konseling</label>
                <input type="datetime-local" name="waktu_konseling" value="{{ \Carbon\Carbon::parse($jadwal_konseling->waktu_konseling)->format('Y-m-d\TH:i') }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Tempat</label>
                <input type="text" name="tempat" value="{{ $jadwal_konseling->tempat }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Perbarui
            </button>
            <a href="{{ route('jadwal-konseling.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
    @endsection

</div>
