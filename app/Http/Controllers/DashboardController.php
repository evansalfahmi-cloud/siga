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

        // Ambil mata pelajaran umum beserta materinya
        $umum = MataPelajaran::where('kategori', 'umum')->with('materi')->get();

        // Debugging: Periksa apakah data benar-benar ada
        if ($umum->isEmpty()) {
            return redirect()->route('dashboard.index')->with('error', 'Tidak ada mata pelajaran umum yang ditemukan.');
        }

        return view('dashboard.dashboard', compact('kejuruan', 'umum'));
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
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        // Pastikan hanya tendik yang bisa menghapus
        if (auth()->user()->role !== 'tendik') {
            return redirect()->route('dashboard.index')->with('error', 'Anda tidak memiliki izin untuk menghapus materi.');
        }

        $materi->delete();

        return redirect()->route('dashboard.index')->with('success', 'Materi berhasil dihapus.');
    }
}
