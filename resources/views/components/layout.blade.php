<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Pembelajaran' }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="container mt-5">


    <div class="content">
        {{ $slot }}
    </div>

</body>
</html>
