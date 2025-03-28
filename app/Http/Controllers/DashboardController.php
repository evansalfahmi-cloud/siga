<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materi;

class DashboardController extends Controller
{
    public function index()
    {
        $materi = Materi::all(); // Ambil semua data
        return view('dashboard', compact('materi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_materi' => 'required',
            'deskripsi' => 'required'
        ]);

        Materi::create([
            'judul_materi' => $request->judul_materi, // ✅ Sesuai dengan input form
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('dashboard')->with('success', 'Materi berhasil ditambahkan.');
    }
}
