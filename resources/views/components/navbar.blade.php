<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">SIGA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Mata Pelajaran
                    </a>
                    <ul class="dropdown-menu">
                        <li><h6 class="dropdown-header">Kejuruan</h6></li>
                        @foreach($kejuruan as $program)
                            <li><a class="dropdown-item" href="#">{{ $program->nama_pelajaran }}</a></li>
                        @endforeach
                        <li><h6 class="dropdown-header">Umum</h6></li>
                        @foreach($umum as $mapel)
                            <li><a class="dropdown-item" href="#">{{ $mapel->nama_pelajaran }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @if(auth()->user()->role === 'tendik')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.create') }}">Tambah Materi</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ auth()->user()->name }} ({{ auth()->user()->role }})</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
