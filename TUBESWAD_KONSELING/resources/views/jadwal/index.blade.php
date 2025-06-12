@extends('layouts.app')

@section('title', 'Buat Jadwal Baru')

@section('content')
    <h2 style="font-size: 24px; margin-bottom: 20px; text-align: center;"> Buat Jadwal Baru</h2>


    <form action="" method="POST" style="max-width: 500px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background-color: #fff;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="nama_mahasiswa" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama:</label>
            <input type="text" name="nama" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="topik" style="display: block; font-weight: bold; margin-bottom: 5px;">Topik:</label>
            <input type="text" name="topik" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="waktu_konseling" style="display: block; font-weight: bold; margin-bottom: 5px;">Waktu Konseling:</label>
            <input type="text" name="waktu_konseling" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
        </div>

        <button type="submit" style="background-color: #4caf50; color: white; padding: 12px 20px; border-radius: 5px; font-size: 16px; width: 100%; cursor: pointer; border: none; transition: background-color 0.3s;">
            Simpan
        </button>
    </form>
@endsection
