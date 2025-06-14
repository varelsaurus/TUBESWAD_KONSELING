<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Konseling - ') }} {{ $konselor->nama }}
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

                    <div class="mb-4">
                        <a href="{{ route('konselor.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali ke Daftar Konselor
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Mahasiswa</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Topik</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Waktu</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Status</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($konselings as $konseling)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $konseling->nama_mahasiswa }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $konseling->topik }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $konseling->waktu_konseling->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($konseling->status === 'menunggu') bg-yellow-100 text-yellow-800
                                                @elseif($konseling->status === 'diterima') bg-green-100 text-green-800
                                                @elseif($konseling->status === 'selesai') bg-blue-100 text-blue-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($konseling->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            @if($konseling->status === 'menunggu')
                                                <form action="{{ route('konseling.tolak', $konseling->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menolak permintaan konseling ini?')">
                                                        Tolak
                                                    </button>
                                                </form>
                                                <form action="{{ route('konseling.terima', $konseling->id) }}" method="POST" class="inline ml-2">
                                                    @csrf
                                                    <button type="submit" 
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menerima permintaan konseling ini?')">
                                                        Terima
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $konselings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 