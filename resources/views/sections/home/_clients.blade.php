<section class="bg-gray-100 py-16 px-6 md:px-20 text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-10">
        {{ $section->title }}
    </h2>
    @php
        $clients = json_decode($section->json_text ?? '[]', true);
    @endphp

    @if(!empty($clients))
        <div class="overflow-hidden">
            <div class="flex flex-wrap justify-center animate-slide items-center gap-10">
                 @foreach (array_merge($clients, $clients) as $client)
                    <div class="inline-flex items-center justify-center w-32 h-16 flex-shrink-0">
                        <img src="{{ asset($client['logo']) }}" 
                            alt="{{ $client['alt'] }}" 
                            class="w-full h-full object-contain mx-auto">
                    </div>
                @endforeach
            </div>
        </div>

        <style>
            @keyframes slide {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .animate-slide {
                display: inline-flex;
                animation: slide 25s linear infinite;
                width: max-content;
            }
        </style>

    @else
        <p class="text-gray-500">Belum ada data klien.</p>
    @endif
</section>
