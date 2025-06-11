@extends('layouts.app')

@section('content')
    <h1>Tambah Konselor</h1>
    <form method="POST" action="{{ route('konselor.store') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="spesialisasi" placeholder="Spesialisasi">
        <input type="text" name="kontak" placeholder="Kontak">
        <button type="submit">Simpan</button>
    </form>
@endsection
