<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Konselor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="mb-6 flex justify-end">
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('konselor.create') }}"
                               class="inline-flex items-center px-6 py-3 bg-green-400 hover:bg-green-600 text-black text-lg font-bold rounded-lg shadow border border-green-700 transition duration-200">
                                <span style="font-size: 1.5em; margin-right: 8px;">&#43;</span>
                                Tambah Konselor
                            </a>
                        @endif
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Nama</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Spesialisasi</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Kontak</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($konselors as $konselor)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $konselor->nama }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $konselor->spesialisasi }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $konselor->kontak }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <a href="{{ route('konselor.edit', $konselor) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            @if(Auth::user()->role == 'admin')
                                                <a href="{{ route('konselor.riwayat', $konselor) }}" class="text-green-600 hover:text-green-900 mr-3">Riwayat</a>
                                            @endif
                                            <form action="{{ route('konselor.destroy', $konselor) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus konselor ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $konselors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
