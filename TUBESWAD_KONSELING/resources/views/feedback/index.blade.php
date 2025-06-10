@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Riwayat Feedback</h1>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Tombol Buat Feedback --}}
        <a href="{{ route('feedback.create') }}" class="btn btn-primary mb-3">Buat Feedback Baru</a>

        {{-- Tabel atau Pesan Kosong --}}
        @if($feedbacks->isEmpty())
            <div class="alert alert-warning">
                Tidak ada riwayat feedback. Silakan kirim feedback terlebih dahulu.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Isi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->jenis }}</td>
                            <td>{{ $feedback->isi }}</td>
                            <td>
                                <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah kamu yakin ingin menghapus feedback ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
