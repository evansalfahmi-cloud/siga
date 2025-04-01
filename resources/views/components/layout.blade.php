<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Pembelajaran' }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar /> <!-- Navbar Component -->

    <div class="content">
        {{ $slot }}
    </div>

    @vite(['resources/js/app.js']) <!-- Load JavaScript -->
    
</body>
</html>
