<header class="fixed top-0 left-0 w-full bg-[#0D1B2A] text-white z-50 shadow-md transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-6">
        {{-- Logo --}}
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/png/logo/logo-gmi-text-putih.png') }}" alt="Logo GMI" class="h-10 w-auto">
        </div>

        {{-- Navigation --}}
        <nav class="hidden md:flex items-center space-x-6 text-sm font-medium relative z-30">
            @foreach ($menus as $menu)
                <div class="relative group">
                    <button class="flex items-center space-x-1 text-white hover:text-yellow-400 focus:outline-none">
                        <span>{{ $menu->title }}</span>
                        @if ($menu->submenus->count() > 0)
                            <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"/>
                            </svg>
                        @endif
                    </button>

                    {{-- Dropdown --}}
                    @if ($menu->submenus->count() > 0)
                        <div
                            class="absolute left-0 hidden group-hover:block bg-white text-black mt-2 shadow-lg rounded-md py-2 w-52 z-50
                                   transition-all duration-100 transform origin-top scale-95 group-hover:scale-100"
                            {{-- Tambahkan padding atas tak terlihat untuk hilangkan gap hover --}}
                            style="padding-top: 8px; margin-top: 0;">
                            @foreach ($menu->submenus as $submenu)
                                <a href="{{ $submenu->hash ? url($menu->route . $submenu->hash) : url($menu->route) }}"
                                   class="block px-4 py-2 hover:bg-gray-100">
                                    {{ $submenu->label }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </nav>

        {{-- Auth Buttons --}}
        <div class="space-x-3">
            <a href="#" class="text-sm hover:text-yellow-400">Sign Up</a>
            <a href="#"
               class="bg-white text-black px-4 py-2 rounded-md text-sm font-semibold hover:bg-yellow-400 hover:text-white transition">
               Login
            </a>
        </div>
    </div>
</header>
<div class="h-20"></div>
<script>
document.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 20) {
        header.classList.add('bg-[#0D1B2A]/95', 'shadow-lg');
    } else {
        header.classList.remove('bg-[#0D1B2A]/95', 'shadow-lg');
    }
});
</script>

