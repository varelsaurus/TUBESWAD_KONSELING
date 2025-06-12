<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonseling;
use Illuminate\Http\Request;
use App\Http\Resources\JadwalKonselingResource;
use Illuminate\Support\Facades\Validator;

class JadwalKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalKonseling = JadwalKonseling::latest()->paginate(5);
        return view('jadwal.index', compact('jadwalKonseling'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required|string',
            'topik' => 'required|string',
            'waktu_konseling' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jadwalKonseling = JadwalKonseling::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'topik' => $request->topik,
            'waktu_konseling' => $request->waktu_konseling,
        ]);

        return new JadwalKonselingResource(true, 'Jadwal konseling berhasil ditambahkan!', $jadwalKonseling);
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalKonseling $jadwalKonseling)
    {
        return new JadwalKonselingResource(true, 'Detail Konseling', $jadwalKonseling);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalKonseling $jadwalKonseling)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required|string',
            'topik' => 'required|string',
            'waktu_konseling' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jadwalKonseling->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'topik' => $request->topik,
            'waktu_konseling' => $request->waktu_konseling,
        ]);

        return new JadwalKonselingResource(true, 'Detail Konseling berhasil diubah!', $jadwalKonseling);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalKonseling $jadwalKonseling)
    {
        $jadwalKonseling->delete();

        return new JadwalKonselingResource(true, 'Data Konseling berhasil dihapus!', null);
    }
}
