<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Multi Indotama</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
