<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Models\Konseling;
use Illuminate\Http\Request;

class KonselorController extends Controller
{
    public function index()
    {
        $konselors = Konselor::latest()->paginate(10);
        return view('konselor.index', compact('konselors'));
    }

    public function create()
    {
        return view('konselor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255'
        ]);

        Konselor::create($validated);

        return redirect()->route('konselor.index')
            ->with('success', 'Konselor berhasil ditambahkan.');
    }

    public function edit(Konselor $konselor)
    {
        return view('konselor.edit', compact('konselor'));
    }

    public function update(Request $request, Konselor $konselor)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255'
        ]);

        $konselor->update($validated);

        return redirect()->route('konselor.index')
            ->with('success', 'Data konselor berhasil diperbarui.');
    }

    public function destroy(Konselor $konselor)
    {
        $konselor->delete();

        return redirect()->route('konselor.index')
            ->with('success', 'Konselor berhasil dihapus.');
    }

    public function riwayat(Konselor $konselor)
    {
        $konselings = $konselor->konselings()
            ->latest('waktu_konseling')
            ->paginate(10);
            
        return view('konselor.riwayat', compact('konselor', 'konselings'));
    }

    public function tolak($id)
    {
        $konseling = Konseling::findOrFail($id);
        $konseling->update(['status' => 'ditolak']);

        return redirect()->back()
            ->with('success', 'Permintaan konseling telah ditolak.');
    }

    public function riwayatSaya()
    {
        $user = auth()->user();
        $konselor = \App\Models\Konselor::where('user_id', $user->id)->firstOrFail();
        $konselings = $konselor->konselings()->latest('waktu_konseling')->paginate(10);
        return view('konselor.riwayat', compact('konselor', 'konselings'));
    }
}