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

    public function create(){
        return view('jadwal.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_mahasiswa'=>'required',
            'topik'=>'required',
            'waktu_konseling'=> 'required',
        ]);
        
        $jadwalDetail = $request->only('nama_mahasiswa', 'topik', 'waktu_konseling');

        auth()->user()->jadwalKonseling()->create($jadwalDetail);

        session()->flash('success', 'Jadwal berhasil dibuat!'); 

        redirect()->route('jadwal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalKonseling $jadwalKonseling, string $id)
    {
        $jadwalKonseling= JadwalKonseling::find($id);
        return view('jadwal.show', compact('jadwalKonseling'));
    }

    public function edit(JadwalKonseling $jadwalKonseling){
        return view('jadwal.edit', compact('jadwalKonseling'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalKonseling $jadwalKonseling)
    {
        $request->validate([
            'nama_mahasiswa'=>'required',
            'topik'=>'required',
            'waktu_konseling'=> 'required',
        ]);

        $jadwalDetail= $request->only('nama_mahasiswa','topik','waktu_konseling');

        $jadwalKonseling->update($jadwalDetail);

        session()->flash('success', 'Jadwal berhasil diperbarui!');

        return redirect()->route('jadwal.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalKonseling $jadwalKonseling)
    {
        $jadwalKonseling->delete();

        session()->flash('success','jadwal berhasil dihapus!');
        return redirect()->route('jadwal.index');
        
    }
}
