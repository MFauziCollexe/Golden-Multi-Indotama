<section id="why" class="relative bg-white py-16 md:py-24 overflow-hidden">
    <div class="container mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center">
        
        {{-- =========================
             KIRI: TEKS + FITUR
        ========================== --}}
        <div>
            {{-- Judul --}}
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-8">
                {{ $section->title ?? 'Kenapa GMI?' }}
            </h2>

            {{-- Ambil isi JSON dan looping --}}
           @php
                $raw = $section->description;
                $clean = strip_tags(trim($raw)); // hapus <p>, <br>, dsb
                $decodedHtml = html_entity_decode($clean); // ubah &quot; jadi "
                $items = json_decode($decodedHtml, true);
            @endphp
            
            @if (!empty($items) && is_array($items))
                <div class="space-y-8">
                    @foreach ($items as $item)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mr-5">
                                <img src="{{ asset('images/svg/' . $item['icon']) }}" 
                                     alt="{{ $item['title'] }}" 
                                     class="w-8 h-8">
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-1">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $item['text'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Belum ada data fitur Why GMI.</p>
            @endif
        </div>

        {{-- =========================
             KANAN: GAMBAR / LOTTIE
        ========================== --}}
        <div class="flex justify-center md:justify-end">
            @if (!empty($section->lottie_path))
                <lottie-player 
                    src="{{ asset($section->lottie_path) }}" 
                    background="transparent" 
                    speed="1" 
                    loop 
                    autoplay 
                    class="w-full max-w-md md:max-w-lg">
                </lottie-player>
            @else
                <img src="{{ asset('images/png/illustrations/why-gmi.png') }}" 
                     alt="Kenapa GMI" 
                     class="w-full max-w-lg">
            @endif
        </div>
    </div>
</section>
