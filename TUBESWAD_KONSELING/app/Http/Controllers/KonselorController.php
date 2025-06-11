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



}