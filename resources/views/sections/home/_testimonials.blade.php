<section id="testimonials" class="bg-gray-50 py-16 text-center">
    <h2 class="text-2xl md:text-3xl font-semibold mb-12">
        {{ $section->title ?? 'Pendapat Klien Kami' }}
    </h2>

    @php
        $testimonials = json_decode($section->json_text ?? '[]', true);
    @endphp

    <div class="swiper mySwiper max-w-5xl mx-auto">
        <div class="swiper-wrapper">
            @foreach ($testimonials as $item)
                <div class="swiper-slide">
                    {{-- Isi testimonial card --}}
                    <div class="flex flex-col md:flex-row items-center justify-center gap-8 px-6">
                        <div class="text-center md:text-left">
                            <img src="{{ asset($item['photo']) }}" 
                                 alt="{{ $item['name'] }}"
                                 class="w-28 h-28 md:w-32 md:h-32 rounded-full mx-auto border-4 border-blue-500 mb-4 md:mb-0">
                            <h3 class="text-lg font-semibold text-blue-700">{{ $item['name'] }}</h3>
                            <p class="text-gray-500 text-sm">{{ $item['company'] }}</p>
                        </div>

                        <div class="bg-white shadow-md rounded-2xl p-8 md:p-10 max-w-xl text-left">
                            <p class="text-blue-600 text-3xl mb-3">“</p>
                            <p class="italic text-gray-700 leading-relaxed">{{ $item['text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Navigasi --}}
        <div class="swiper-button-next !text-blue-600"></div>
        <div class="swiper-button-prev !text-blue-600"></div>
        <div class="swiper-pagination mt-6"></div>
    </div>
</section>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    new Swiper(".mySwiper", {
        loop: true,               // terus berputar
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 800,
        autoplay: {
            delay: 4000,          // otomatis ganti setiap 4 detik
            disableOnInteraction: false, // tetap lanjut meski user klik
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});
</script>
