{{-- =========================
     ABOUT US SECTION
========================== --}}
<section 
    id="about-us"
    class="relative py-20 bg-gray-50 overflow-hidden"
>
    <div class="container mx-auto px-6 md:px-12 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            {{-- AREA ANIMASI (DIPERBAIKI) --}}
            @if(!empty($section->lottie_path))
                <div class="flex justify-center md:justify-end">
                    <!-- 
                        PERBAIKAN:
                        1. Menggunakan <lottie-player> alih-alih <img>
                        2. Menghapus 'storage/' dari asset() 
                           (Sesuaikan path tergantung isi database Anda, lihat catatan di bawah)
                    -->
                    <lottie-player
                        src="{{ asset($section->lottie_path) }}"
                        background="transparent"
                        speed="1"
                        style="width: 100%; max-width: 500px; height: auto;"
                        loop
                        autoplay
                    ></lottie-player>
                </div>
            @endif

            {{-- Konten (Tidak berubah) --}}
            <div>
                @if(!empty($section->subtitle))
                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-2">
                        {{ $section->subtitle }}
                    </p>
                @endif

                @if(!empty($section->title))
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        {{ $section->title }}
                    </h2>
                @endif

                @if(!empty($section->description))
                    <p class="text-gray-600 leading-relaxed mb-6">
                        {!! $section->description !!}
                    </p>
                @endif

                @if(!empty($section->button_text) && !empty($section->button_link))
                    <a href="{{ $section->button_link }}"
                       class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition-all duration-300">
                        {{ $section->button_text }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>