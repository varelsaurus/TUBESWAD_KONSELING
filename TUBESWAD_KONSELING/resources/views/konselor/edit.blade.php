@extends('layouts.app')

@section('content')
    <h1>Edit Konselor</h1>
    <form method="POST" action="{{ route('konselor.update', $konselor->id) }}">
        @csrf @method('PUT')
        <input type="text" name="nama" value="{{ $konselor->nama }}">
        <input type="text" name="spesialisasi" value="{{ $konselor->spesialisasi }}">
        <input type="text" name="kontak" value="{{ $konselor->kontak }}">
        <button type="submit">Update</button>
    </form>
@endsection
