<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $keluhans = Keluhan::with('mahasiswa')->latest()->get();
        return view('keluhan.index', compact('keluhans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keluhan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'mahasiswaId' => 'required|integer',
            'pesan' => 'required|string|max:255',
        ]);
        $keluhan = Keluhan::create([
            'mahasiswaId' => $request->mahasiswaId,
            'pesan' => $request->pesan,
            'status' => 'baru',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Keluhan created successfully',
                'keluhan' => $keluhan,
            ], 201);
        }
        if (!$keluhan) {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan creation failed');
        }
        return redirect()->route('keluhan.index')->with('success', 'Keluhan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $keluhan = Keluhan::with('mahasiswa')->findOrFail($id);
        if (!$keluhan) {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan not found');
        }
        return view('keluhan.show', compact('keluhan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $keluhan = Keluhan::findOrFail($id);
        if (!$keluhan) {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan not found');
        }
    
        return view('keluhan.edit', compact('keluhan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $keluhan = Keluhan::findOrFail($id);
        if (!$keluhan) {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan not found');
        }
        // Validate the request data
        $request->validate([
            'pesan' => 'required|string|max:255',
            'status' => 'required|string|in:baru,diproses,selesai',
        ]);
        // Update the keluhan
        $keluhan->update([
            'pesan' => $request->pesan,
            'status' => $request->status,
        ]);
        // Check if the keluhan is in 'baru' status before updating
        if ($keluhan->status !== 'baru') {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan cannot be updated because it is not in "baru" status');
        }
        if ($request->wantsJson()) {
            return response()->json([
            'message' => 'Keluhan updated successfully',
            'keluhan' => $keluhan,
            ], 200);
        }

        return redirect()->route('keluhan.index')->with('success', 'Keluhan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $keluhan = Keluhan::findOrFail($id);
        if (!$keluhan) {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan not found');
        }
        if ($keluhan->status !== 'baru') {
            return redirect()->route('keluhan.index')->with('error', 'Keluhan cannot be deleted because it is not in "baru" status');
        }
        // Check if the keluhan is in 'baru' status before deleting
        $keluhan->delete();
        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Keluhan deleted successfully',
            ], 200);
        }
        return redirect()->route('keluhan.index')->with('success', 'Keluhan deleted successfully');
    }
}
