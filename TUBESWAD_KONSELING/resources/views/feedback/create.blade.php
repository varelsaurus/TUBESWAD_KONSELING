@extends('layouts.app')

@section('content')
    <h1>Buat Feedback</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('feedback.store') }}">
        @csrf

        <div class="mb-3">
            <label>Jenis Feedback</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Saran">Saran</option>
                <option value="Keluhan">Keluhan</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Isi Feedback</label>
            <textarea name="isi" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
@endsection
