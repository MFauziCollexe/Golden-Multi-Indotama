<footer class="bg-[#0B1739] text-white py-14 px-6 md:px-20">
    <div class="max-w-7xl mx-auto grid md:grid-cols-6 gap-10">

        {{-- Kolom Logo & Deskripsi --}}
        <div class="md:col-span-1">
            <img src="{{ asset('images/png/logo/logo-gmi-text-putih.png') }}" alt="Logo GMI" 
                class="w-32 md:w-40 lg:w-48">
            <p class="text-sm text-gray-300 leading-relaxed">
                Menyediakan solusi penyimpanan dingin terintegrasi untuk menjamin kualitas, keamanan,
                dan konsistensi produk dari penyimpanan hingga distribusi.
            </p>

            {{-- Sosial Media --}}
            @if(isset($footerSocials) && $footerSocials->count())
                <div class="flex space-x-3 mt-4">
                    @foreach ($footerSocials as $social)
                        <a href="{{ $social->url }}" target="_blank" class="hover:text-yellow-400 transition">
                            <i class="{{ $social->icon }}"></i>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Loop Menu Footer --}}
        @foreach ($footerMenus as $menu)
            <div>
                <h3 class="font-semibold text-lg mb-3">{{ $menu->title }}</h3>

                @if ($menu->submenus->count() > 0)
                    <ul class="space-y-2 text-sm text-gray-300">
                        @foreach ($menu->submenus as $submenu)
                            <li>
                                <a href="{{ $submenu->hash ? url($menu->route . $submenu->hash) : url($menu->route) }}"
                                   class="hover:text-yellow-400 transition">
                                   {{ $submenu->label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    {{-- Jika tidak ada submenu dan menu = Hubungi Kami --}}
                    @if (strtolower($menu->title) === 'hubungi kami')
                        <ul class="text-sm text-gray-300 space-y-3">
                            <li class="flex items-start gap-2">
                                <img src="{{ asset('images/svg/map.svg') }}" alt="Lokasi"
                                    class="w-5 h-5 mt-1 invert brightness-0 sepia saturate-100 hue-rotate-[50deg] text-yellow-400">
                                <span>Jl. Raya Rungkut Industri II No.45, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur 60298</span>
                            </li>

                            <li class="flex items-start gap-2">
                                <img src="{{ asset('images/svg/user.svg') }}" alt="Kontak"
                                    class="w-5 h-5 mt-1 invert brightness-0 sepia saturate-100 hue-rotate-[50deg] text-yellow-400">
                                <span>
                                    Mr. Nazumah<br>
                                    <a href="tel:+6281217755267" class="hover:text-yellow-400">+62 812-1775-5267</a>
                                </span>
                            </li>

                            <li class="flex items-start gap-2">
                                <img src="{{ asset('images/svg/mail.svg') }}" alt="Email"
                                    class="w-5 h-5 mt-1 invert brightness-0 sepia saturate-100 hue-rotate-[50deg] text-yellow-400">
                                <a href="mailto:commercial@coldkeygmi.com" class="hover:text-yellow-400">
                                    commercial@coldkeygmi.com
                                </a>
                            </li>
                        </ul>
                    @endif
                @endif
            </div>
        @endforeach

    </div>

    {{-- Copyright --}}
    <div class="border-t border-gray-700 mt-12 pt-6 text-center text-sm text-gray-400">
        © {{ date('Y') }} Golden Multi Indotama. All Rights Reserved.
    </div>
</footer>
