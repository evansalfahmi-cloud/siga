<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>
<body class="container mt-5">
    <h1 class="text-primary">Dashboard</h1>
    <p>Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Daftar Materi -->
    <h3 class="mt-4">Daftar Materi</h3>
    <ul class="list-group">
    @foreach($materi as $item)
    <li class="list-group-item">
        <strong>{{ $item->judul_materi }}</strong><br> <!-- ✅ Perbaikan -->
        {{ $item->deskripsi }}
    </li>
    @endforeach

    </ul>

    <!-- Form Tambah Materi (Hanya untuk Tendik) -->
    @if(auth()->user()->role === 'tendik')
        <h3 class="mt-4">Tambah Materi</h3>
        <form action="{{ route('dashboard.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul Materi</label>
        <input type="text" name="judul_materi" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
    @endif

    <!-- Logout -->
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>
