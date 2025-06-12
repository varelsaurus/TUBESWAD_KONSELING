<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    @extends('layouts.app')

    @section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Jadwal Konseling</h2>
            <a href="{{ route('jadwal-konseling.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Jadwal
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full table-auto border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">Nama Mahasiswa</th>
                    <th class="py-2 px-4 border-b">Topik</th>
                    <th class="py-2 px-4 border-b">Waktu</th>
                    <th class="py-2 px-4 border-b">Tempat</th>
                    <th class="py-2 px-4 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwalKonseling as $jadwal)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $jadwal->nama_mahasiswa }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->topik }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->waktu_konseling }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->tempat }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('jadwal-konseling.edit', $jadwal->id) }}" class="text-blue-600 hover:underline">Edit</a>

                                <form action="{{ route('jadwal-konseling.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                            Belum ada jadwal konseling.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endsection


</div>
