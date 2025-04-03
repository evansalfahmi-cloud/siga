<x-layout title="Dashboard">

    <h1 class="text-success text-center mb-4">Dashboard</h1> <!-- Warna Hijau -->
    <div class="alert alert-success text-center">Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }})</div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Daftar Materi Kejuruan -->
    <h3 class="mt-4 text-success">📌 Mata Pelajaran Kejuruan</h3>
    @foreach($kejuruan as $program)
        <h4 class="mt-3 text-dark">{{ $program->nama }}</h4>
        <ul class="list-group mb-3">
            @foreach($program->mata_pelajaran as $mapel)
                <h5 class="text-success mt-2">{{ $mapel->nama_pelajaran }}</h5> <!-- Warna Hijau -->

                @if(count($mapel->materi) == 0)
                    <li class="list-group-item text-muted">⚠️ Belum ada materi pada mapel ini</li>
                @else
                    @foreach($mapel->materi as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $item->judul_materi }}</strong><br>
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
                @endif
            @endforeach
        </ul>
    @endforeach

    <!-- Daftar Materi Umum -->
    <h3 class="mt-4 text-success">📘 Mata Pelajaran Umum</h3>
    <ul class="list-group">
        @foreach($umum as $mapel)
            <h5 class="text-success mt-2">{{ $mapel->nama_pelajaran }}</h5> <!-- Warna Hijau -->

            @if(count($mapel->materi) == 0)
                <li class="list-group-item text-muted">⚠️ Belum ada materi pada mapel ini</li>
            @else
                @foreach($mapel->materi as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item->judul_materi }}</strong><br>
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
            @endif
        @endforeach
    </ul>

</x-layout> 
