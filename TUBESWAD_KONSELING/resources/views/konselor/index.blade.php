@extends('layouts.app')

@section('content')
    <h1>Daftar Konselor</h1>
    <a href="{{ route('konselor.create') }}">Tambah Konselor</a>
    <ul>
        @foreach ($konselors as $k)
            <li>{{ $k->nama }} - {{ $k->spesialisasi }} - {{ $k->kontak }}
                <a href="{{ route('konselor.edit', $k->id) }}">Edit</a>
                <form action="{{ route('konselor.destroy', $k->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
