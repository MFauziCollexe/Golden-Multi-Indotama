<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Multi Indotama</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-900 antialiased">

    {{-- Header --}}
    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    @vite('resources/js/app.js')
</body>
</html>
