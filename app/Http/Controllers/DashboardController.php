<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materi;
use App\Models\MataPelajaran;
use App\Models\ProgramKeahlian;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data program keahlian beserta mata pelajaran dan materinya
        $kejuruan = ProgramKeahlian::with(['mata_pelajaran.materi'])->get();


        // Ambil mata pelajaran umum beserta materinya (Pastikan kategori sesuai dengan migration)
        $umum = MataPelajaran::where('kategori', 'Umum')->with('materi')->get();

        return view('dashboard', compact('kejuruan', 'umum'));
    }

    public function store(Request $request)
    {
        // Validasi input dengan batas panjang maksimal
        $request->validate([
            'judul_materi' => 'required|max:255',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'content' => 'required'
        ]);
    
        // Simpan ke database
        Materi::create([
            'judul_materi' => $request->judul_materi,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'content' => $request->content,
            'user_id' => auth()->id(), // Simpan user yang menambahkan materi
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
