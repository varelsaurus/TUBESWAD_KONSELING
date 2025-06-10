<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Resource\MahasiswaResource;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);

        return new MahasiswaResource(true, 'Daftar Mahasiswa', $mahasiswa);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nim' => 'required|string|max:12',
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return new MahasiswaResource(true, 'Detail mahasiswa berhasil ditambahkan', $mahasiswa);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($id);

        return new MahasiswaResource(true, 'Daftar Mahaiswa', $mahasiswas);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required',
            'nim' => 'sometimes|required',
            'jurusan' => 'sometimes|required',
            'fakultas' => 'sometimes|required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return new MahasiswaResource(true, 'Detail Mahasiswa berhasil ditambah!', $mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        
    }
}
