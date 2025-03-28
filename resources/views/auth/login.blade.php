<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <style>
        /* Styling untuk background */
        .bg-container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        .bg-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset('img/bglogin.jpg') }}') no-repeat center center;
            background-size: cover;
            opacity: 0.15; /* Mengatur opacity */
        }

        /* Styling untuk konten agar tetap terlihat jelas */
        .content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="bg-container"></div>

    <div class="content d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="text-center mb-5 w-100">
            <h3 class="fw-bold text-success">Selamat Datang di S1GA Project</h3>
            <p class="fs-5 text-success">Silahkan Login terlebih dahulu:</p>
        </div>

        <div class="card p-4 shadow-lg bg-white" style="width: 350px; backdrop-filter: blur(10px);">
            <h4 class="text-center mb-3">Login</h4>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                @if ($errors->has('loginError'))
                    <div class="alert alert-danger">{{ $errors->first('loginError') }}</div>
                @endif
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
        </div>
    </div>
</body>


</html>
