<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonseling;
use Illuminate\Http\Request;
use App\Http\Resources\JadwalKonselingResource;
use Illuminate\Support\Facades\Validator;

class JadwalKonselingController extends Controller
{
    public function index()
    {
        $jadwalKonseling = JadwalKonseling::latest()->paginate(5);
        return view('jadwal.index', compact('jadwalKonseling'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'topik' => 'required',
            'waktu_konseling' => 'required|date_format:Y-m-d H:i:s',
        ]);
        
        $jadwalDetail = $request->only('nama_mahasiswa', 'topik', 'waktu_konseling');

        auth()->user()->JadwalKonseling()->create($jadwalDetail); 

        session()->flash('success', 'Jadwal berhasil dibuat!');

        return redirect()->route('jadwal.index'); 
    }

    public function show(JadwalKonseling $jadwalKonseling, string $id)
    {
        $jadwalKonseling = JadwalKonseling::find($id);
        return view('jadwal.show', compact('jadwalKonseling'));
    }

    public function edit(JadwalKonseling $jadwalKonseling)
    {
        return view('jadwal.edit', compact('jadwalKonseling'));
    }

    public function update(Request $request, JadwalKonseling $jadwalKonseling)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'topik' => 'required',
            'waktu_konseling' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $jadwalDetail = $request->only('nama_mahasiswa', 'topik', 'waktu_konseling');

        $jadwalKonseling->update($jadwalDetail);

        session()->flash('success', 'Jadwal berhasil diperbarui!');

        return redirect()->route('jadwal.index');
    }

    public function destroy(JadwalKonseling $jadwalKonseling)
    {
        $jadwalKonseling->delete();

        session()->flash('success', 'Jadwal berhasil dihapus!');
        return redirect()->route('jadwal.index');
    }

    public function apiIndex()
    {
        $jadwalKonseling = JadwalKonseling::latest()->paginate(5);
        return response()->json([
            'success' => true,
            'data' => JadwalKonselingResource::collection($jadwalKonseling)->resolve(),
            'pagination' => [
                'current_page' => $jadwalKonseling->currentPage(),
                'total_pages' => $jadwalKonseling->lastPage(),
                'total_items' => $jadwalKonseling->total(),
            ],
            'message' => 'Jadwal konseling retrieved successfully'
        ], 200);
    }

    public function apiStore(Request $request)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required'
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'nama_mahasiswa' => 'required|string|max:255',
                'topik' => 'required|string|max:255',
                'waktu_konseling' => 'required|date_format:Y-m-d H:i:s',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $jadwalDetail = $request->only('nama_mahasiswa', 'topik', 'waktu_konseling');
            $jadwal = auth()->user()->JadwalKonseling()->create($jadwalDetail);

            return response()->json([
                'success' => true,
                'data' => new JadwalKonselingResource($jadwal),
                'message' => 'Jadwal konseling created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating jadwal: ' . $e->getMessage()
            ], 500);
        }
    }

    public function apiShow($id)
    {
        $jadwalKonseling = JadwalKonseling::find($id);

        if (!$jadwalKonseling) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new JadwalKonselingResource($jadwalKonseling),
            'message' => 'Jadwal konseling retrieved successfully'
        ], 200);
    }

    public function apiUpdate(Request $request, $id)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required'
                ], 401);
            }

            $jadwalKonseling = JadwalKonseling::find($id);

            if (!$jadwalKonseling) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal tidak ditemukan'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'nama_mahasiswa' => 'required|string|max:255',
                'topik' => 'required|string|max:255',
                'waktu_konseling' => 'required|date_format:Y-m-d H:i:s',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $jadwalDetail = $request->only('nama_mahasiswa', 'topik', 'waktu_konseling');
            $jadwalKonseling->update($jadwalDetail);

            return response()->json([
                'success' => true,
                'data' => new JadwalKonselingResource($jadwalKonseling),
                'message' => 'Jadwal konseling updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating jadwal: ' . $e->getMessage()
            ], 500);
        }
    }

    public function apiDestroy($id)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required'
                ], 401);
            }

            $jadwalKonseling = JadwalKonseling::find($id);

            if (!$jadwalKonseling) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal tidak ditemukan'
                ], 404);
            }

            $jadwalKonseling->delete();

            return response()->json([
                'success' => true,
                'message' => 'Jadwal konseling deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting jadwal: ' . $e->getMessage()
            ], 500);
        }
    }
}
