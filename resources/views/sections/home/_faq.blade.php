@php
  // Decode FAQ JSON (misalnya berisi daftar pertanyaan dan jawaban)
  $faqs = json_decode($section->json_text ?? '[]', true);
@endphp

<section id="faq"
  class="bg-white py-20 px-6 md:px-20"
  x-data="{ openIndex: null }">

  <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    {{-- BAGIAN KIRI: FAQ LIST --}}
    <div>
      {{-- Title --}}
      <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
        {{ $section->title ?? 'Frequently Asked Questions' }}
      </h2>

      {{-- Subtitle --}}
      @if(!empty($section->subtitle))
        <p class="text-gray-600 mb-10">
          {{ $section->subtitle }}
        </p>
      @endif

      {{-- FAQ Items --}}
        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
            <div
                class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden transition hover:shadow-md"
            >
                <button
                @click="openIndex === {{ $index }} ? openIndex = null : openIndex = {{ $index }}"
                class="w-full flex justify-between items-center text-left px-6 py-4 font-semibold text-gray-800 focus:outline-none"
                >
                <span>{{ $faq['question'] ?? 'Pertanyaan' }}</span>
                <span
                    class="text-gray-500 transform transition-transform duration-300"
                    :class="openIndex === {{ $index }} ? 'rotate-45 text-blue-600' : ''"
                    >
                    +
                </span>
                </button>
                <div
                    x-show="openIndex === {{ $index }}"
                    x-collapse.duration.1000ms
                    class="px-6 text-gray-600 text-sm leading-relaxed origin-top"
                >
                <div class="pb-6">
                    {!! $faq['answer'] ?? '' !!}
                </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    {{-- BAGIAN KANAN: GAMBAR / LOTTIE --}}
    <div class="flex justify-center">
      @if(!empty($section->lottie_path))
        <div id="faqLottie" class="w-full max-w-md"
          data-path="{{ asset($section->lottie_path) }}">
        </div>
      @elseif(!empty($section->image_path))
        <img
          src="{{ asset($section->image_path) }}"
          alt="FAQ Illustration"
          class="w-full max-w-md object-contain"
        />
      @endif
    </div>
  </div>
</section>

{{-- ✅ Optional: Jalankan Lottie --}}
@if(!empty($section->lottie_path))
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      if (typeof bodymovin !== 'undefined') {
        bodymovin.loadAnimation({
          container: document.getElementById('faqLottie'),
          path: document.getElementById('faqLottie').dataset.path,
          renderer: 'svg',
          loop: true,
          autoplay: true,
        });
      }
    });
  </script>
@endif
