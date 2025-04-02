<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">SIGA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <!-- Show "Tambah" menu only for Tendik users -->
                @if(Auth::check() && Auth::user()->role === 'tendik')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.create') }}">Tambah</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
