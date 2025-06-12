@extends('layouts.app')

@section('content')
    <h1>Edit Feedback</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('feedback.update', $feedback->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Pilihan Feedback</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Saran" {{ $feedback->jenis == 'Saran' ? 'selected' : '' }}>Saran</option>
                <option value="Keluhan" {{ $feedback->jenis == 'Keluhan' ? 'selected' : '' }}>Keluhan</option>
                <option value="Lainnya" {{ $feedback->jenis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Isi Feedback</label>
            <textarea name="isi" class="form-control" rows="4" required>{{ $feedback->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
@endsection
