@php
    // Ambil section "partner"
    $partnerSection = $sections->firstWhere('section_name', 'partner');

    // Pastikan selalu array agar aman
    $images = [];
    $features = [];

    if (!empty($partnerSection) && !empty($partnerSection->image_path)) {
        $decoded = json_decode($partnerSection->image_path, true);
        if (is_array($decoded)) {
            $images = $decoded;
        }
    }

    if (!empty($partnerSection) && !empty($partnerSection->json_text)) {
        $decoded = json_decode($partnerSection->json_text, true);
        if (is_array($decoded)) {
            $features = $decoded;
        }
    }

    // Pastikan jumlah slide aman untuk Alpine
    $totalSlides = count($images);
@endphp

@if($partnerSection)
<section id="partner" class="py-16 bg-white">
    <div class="container mx-auto flex flex-col lg:flex-row items-center gap-10 px-6">

        {{-- === SLIDESHOW === --}}
        <div class="relative w-full lg:w-1/2"
             x-data='@json(["activeSlide" => 0, "total" => $totalSlides])'
             x-init="setInterval(() => activeSlide = (activeSlide + 1) % total, 4000)">
            
            <div class="relative overflow-hidden rounded-2xl shadow-lg h-[450px]">
                @foreach($images as $index => $img)
                    <img 
                        src="{{ asset($img['image']) }}" 
                        alt="Slide {{ $index + 1 }}"
                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
                        x-bind:class="activeSlide === {{ $index }} ? 'opacity-100' : 'opacity-0'"
                    >
                @endforeach
            </div>

            {{-- Tombol navigasi --}}
            <button 
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow"
                @click="activeSlide = (activeSlide - 1 + total) % total"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button 
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow"
                @click="activeSlide = (activeSlide + 1) % total"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            {{-- Dot indicator --}}
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach($images as $index => $img)
                    <div class="w-3 h-3 rounded-full cursor-pointer"
                        :class="activeSlide === {{ $index }} ? 'bg-blue-600' : 'bg-gray-300'"
                        @click="activeSlide = {{ $index }}"></div>
                @endforeach
            </div>
        </div>

        {{-- === KONTEN TEKS === --}}
        <div class="w-full lg:w-1/2">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                {!! $partnerSection->title !!}
            </h2>

            @if(!empty($partnerSection->subtitle))
                <h3 class="text-lg font-medium text-blue-600 mb-2">
                    {!! $partnerSection->subtitle !!}
                </h3>
            @endif

            <p class="text-gray-700 mb-6 leading-relaxed text-justify">
                {!! $partnerSection->description !!}
            </p>

            <br>

            {{-- Fitur dari json_text --}}
            @if(!empty($features))
                <div class="grid sm:grid-cols-2 gap-5 text-gray-700">
                    @foreach ($features as $item)
                        @if(isset($item['icon']) && isset($item['text']))
                            <div class="flex items-start gap-3">
                                <img src="{{ asset($item['icon']) }}" alt="icon" class="w-6 h-6 mt-1">
                                <p>{!! $item['text'] !!}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endif
