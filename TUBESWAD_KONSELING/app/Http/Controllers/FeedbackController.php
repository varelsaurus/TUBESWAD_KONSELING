<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(){
        $feedbacks = Feedback::where('user_id', auth()->id())->get();
        if ($feedbacks->isEmpty()) {
            return view('feedback.index', compact('feedbacks'))
            ->with('error', 'Tidak ada riwayat feedback. Silakan buat feedback terlebih dahulu.');
        }
        return view('feedback.index', compact('feedbacks'));
    }


    public function create() {
        return view('feedback.create');
    }

    public function store(Request $request) {
        $request->validate([
            'jenis' => 'required|string',
            'isi' => 'required|string',
        ]);
        try {
            Feedback::create([
                'user_id' => auth()->id(),
                'jenis' => $request->jenis,
                'isi' => $request->isi,
            ]);
            
            return redirect()->route('feedback.index')->with('success', 'Feedback tersimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Feedback gagal disimpan. Silakan coba lagi.');
        }
    }

    public function destroy($id) {
        $feedback = Feedback::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dihapus.');
    }

    public function edit($id) {
        $feedback = Feedback::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'jenis' => 'required|string',
            'isi' => 'required|string',
        ]);
        
        try {
            $feedback = Feedback::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
            $feedback->update([
                'jenis' => $request->jenis,
                'isi' => $request->isi,
            ]);
            
            return redirect()->route('feedback.index')->with('success', 'Feedback terbaru berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengupdate feedback. Silakan coba lagi.');
        }
    }

}
