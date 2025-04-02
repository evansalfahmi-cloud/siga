<x-layout title="Tambah Materi">
    <h1 class="text-success text-center mb-4">Tambah Materi</h1> <!-- Warna Hijau -->

    <div class="card p-4 shadow-sm">
        <h3 class="text-success">➕ Tambah Materi</h3>
        <form action="{{ route('dashboard.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul Materi</label>
                <input type="text" name="judul_materi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <select name="mata_pelajaran_id" class="form-control" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach($kejuruan as $program)
                        <optgroup label="📌 {{ $program->nama_keahlian }}">
                            @foreach($program->mataPelajaran as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama_pelajaran }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                    <optgroup label="📘 Mata Pelajaran Umum">
                        @foreach($umum as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama_pelajaran }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Isi Materi</label>
                <textarea name="content" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</x-layout>
