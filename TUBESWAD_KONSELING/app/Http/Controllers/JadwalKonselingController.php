<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonseling;
use Illuminate\Http\Request;
use App\Http\Resource\JadwalKonselingResource;
use Illuminate\Support\Facades\Validator;

class JadwalKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalKonseling = JadwalKonseling::latest()->paginate(5);

        return new JadwalKonselingResource(true, 'Daftar Konseling', $jadwalKonseling);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required|string',
            'topik' => 'required|string|max:12',
            'waktu_konseling' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $jadwalKonseling = JadwalKonseling::create([
            'nama_mahasiswa' => $request->nama,
            'topik' => $request->topik,
            'waktu_konseling' => $request->waktu_konseling,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalKonseling $jadwalKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalKonseling $jadwalKonseling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalKonseling $jadwalKonseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalKonseling $jadwalKonseling)
    {
        //
    }
}
