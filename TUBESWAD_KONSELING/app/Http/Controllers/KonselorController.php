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

}