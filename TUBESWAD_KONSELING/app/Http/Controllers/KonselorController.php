<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use Illuminate\Http\Request;

class KonselorController extends Controller
{
    public function index() {
        $konselors = Konselor::all();
        return view('konselor.index', compact('konselors'));
    }

    public function create() {
        return view('konselor.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'kontak' => 'required',
        ]);

        Konselor::create($request->all());
        return redirect()->route('konselor.index')->with('success', 'Konselor berhasil ditambahkan.');
    }

    public function edit(Konselor $konselor) {
        return view('konselor.edit', compact('konselor'));
    }

    public function update(Request $request, Konselor $konselor) {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'kontak' => 'required',
        ]);

        $konselor->update($request->all());
        return redirect()->route('konselor.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Konselor $konselor) {
        $konselor->delete();
        return redirect()->route('konselor.index')->with('success', 'Data berhasil dihapus.');
    }
}