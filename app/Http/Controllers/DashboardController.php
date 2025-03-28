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
        // Validasi input
        $request->validate([
            'judul_materi' => 'required',
            'mata_pelajaran' => 'required', // ✅ Tambahkan validasi mata pelajaran
            'deskripsi' => 'required'
        ]);
    
        // Simpan ke database
        Materi::create([
            'judul_materi' => $request->judul_materi,
            'mata_pelajaran' => $request->mata_pelajaran,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(), // ✅ Simpan user yang menambahkan materi
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Materi berhasil ditambahkan.');
        
    }

    public function destroy($id)
{
    $materi = Materi::findOrFail($id);

    // Pastikan hanya tendik yang bisa menghapus
    if (auth()->user()->role !== 'tendik') {
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki izin untuk menghapus materi.');
    }

    $materi->delete();

    return redirect()->route('dashboard')->with('success', 'Materi berhasil dihapus.');
}

}
