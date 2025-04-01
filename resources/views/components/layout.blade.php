<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Pembelajaran' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Load Bootstrap -->
</head>
<body class="container mt-5">
    <x-navbar /> <!-- Navbar Component -->

    <div class="content">
        {{ $slot }}
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Load JavaScript -->
    
</body>
</html>
