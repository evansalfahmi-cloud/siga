<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light font-sans">

    <div class="text-center mb-5 w-100">
        <h3 class="fw-bold text-success">Selamat Datang di S1GA Project</h3>
        <p class="fs-5 text-success">Silahkan Login terlebih dahulu:</p>
    </div>

    <div class="card p-4 shadow-lg" style="width: 350px;">
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

</body>


</html>
