<x-layout title="Tambah Materi">
    <h1 class="text-success text-center mb-4">Tambah Materi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('dashboard.store') }}" method="POST" class="card p-3 shadow-sm">
        @csrf
        
        <!-- Input Judul Materi -->
        <div class="mb-3">
            <label class="form-label">Judul Materi</label>
            <input type="text" name="judul_materi" class="form-control @error('judul_materi') is-invalid @enderror" value="{{ old('judul_materi') }}" required>
            @error('judul_materi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Input Mata Pelajaran -->
        <div class="mb-3">
            <label class="form-label">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" class="form-control @error('mata_pelajaran_id') is-invalid @enderror" required>
                <option value="">Pilih Mata Pelajaran</option>
                @foreach($kejuruan as $program)
                    <optgroup label="📌 {{ $program->nama_keahlian }}">
                        @foreach($program->mataPelajaran as $mapel)
                            <option value="{{ $mapel->id }}" {{ old('mata_pelajaran_id') == $mapel->id ? 'selected' : '' }}>{{ $mapel->nama_pelajaran }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
                <optgroup label="📘 Mata Pelajaran Umum">
                    @foreach($umum as $mapel)
                        <option value="{{ $mapel->id }}" {{ old('mata_pelajaran_id') == $mapel->id ? 'selected' : '' }}>{{ $mapel->nama_pelajaran }}</option>
                    @endforeach
                </optgroup>
            </select>
            @error('mata_pelajaran_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Input Isi Materi -->
        <div class="mb-3">
            <label class="form-label">Isi Materi</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="4" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Tambah</button>
    </form>
</x-layout>
