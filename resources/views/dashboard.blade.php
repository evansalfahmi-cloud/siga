<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="container mt-5">
    <h1 class="text-primary text-center mb-4">Dashboard</h1>
    <div class="alert alert-info text-center">Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }})</div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Daftar Materi Kejuruan -->
    <h3 class="mt-4">📌 Mata Pelajaran Kejuruan</h3>
    @foreach($kejuruan as $program)
        <h4 class="mt-3 text-secondary">{{ $program->nama }}</h4>
        <ul class="list-group mb-3">
            @foreach($program->mata_pelajaran as $mapel)
                @foreach($mapel->materi as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item->judul_materi }}</strong><br>
                            <span class="text-muted">{{ $mapel->nama }}</span>
                            <p class="mb-1">{{ $item->content }}</p>
                            <small class="text-muted">Ditambahkan oleh: {{ $item->user->name }}</small>
                        </div>
                        @if(auth()->user()->role === 'tendik')
                            <form action="{{ route('dashboard.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            @endforeach
        </ul>
    @endforeach

    <!-- Daftar Materi Umum -->
    <h3 class="mt-4">📘 Mata Pelajaran Umum</h3>
    <ul class="list-group">
        @foreach($umum as $mapel)
            @foreach($mapel->materi as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $item->judul_materi }}</strong><br>
                        <span class="text-muted">{{ $mapel->nama }}</span>
                        <p class="mb-1">{{ $item->content }}</p>
                        <small class="text-muted">Ditambahkan oleh: {{ $item->user->name }}</small>
                    </div>
                    @if(auth()->user()->role === 'tendik')
                        <form action="{{ route('dashboard.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </li>
            @endforeach
        @endforeach
    </ul>

    <!-- Form Tambah Materi (Hanya untuk Tendik) -->
    @if(auth()->user()->role === 'tendik')
        <h3 class="mt-4">➕ Tambah Materi</h3>
        <form action="{{ route('dashboard.store') }}" method="POST" class="card p-3 shadow-sm">
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
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    @endif

    <!-- Logout -->
    <form action="{{ route('logout') }}" method="POST" class="mt-4 text-center">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>