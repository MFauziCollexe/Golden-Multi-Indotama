<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Multi Indotama</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-900 antialiased">

    {{-- Header --}}
    @include('layouts.header')

     {{-- Tampilkan warning global bila DB bermasalah --}}
    @if(!empty($dbError))
        <div class="bg-yellow-100 text-yellow-800 text-sm text-center py-2 border-b border-yellow-300 z-50 relative">
            <div id="gmi-Error-404" class="w-20 h-20 mb-2"></div>
            ⚠️ Beberapa data tidak dapat dimuat. Silakan coba lagi nanti.
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    @vite('resources/js/app.js')
</body>
</html>
