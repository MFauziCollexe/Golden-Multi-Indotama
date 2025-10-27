@php
    $advantageSection = $sections->firstWhere('section_name', 'advantages');
    $items = [];
    if ($advantageSection && $advantageSection->json_text) {
        $items = json_decode($advantageSection->json_text, true);
    }
@endphp

@if($advantageSection)
<section class="px-6 md:px-20 py-16 bg-white">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Kolom kiri --}}
    <div class="bg-[#10141f]/10 p-6 rounded-xl shadow">
      <h2 class="font-bold text-black text-xl mb-4">
        {!! $advantageSection->subtitle !!}
      </h2>

      <ul class="space-y-3">
        @foreach ($items as $item)
            <li>
                <div class="flex items-center gap-4 bg-blue-500
                            shadow-md shadow-blue-500/50 p-3 rounded-lg">
                    @if(isset($item['icon']))
                    <img src="{{ asset($item['icon']) }}" alt="icon" 
                    class="w-14 h-14 invert brightness-0 object-contain">
                    @endif
                    <span class="text-sm font-bold text-white">{{ $item['text'] ?? '' }}</span>
                </div>
            </li>
        @endforeach
      </ul>
    </div>

    {{-- Kolom kanan --}}
    <div class="md:col-span-2 bg-slate-800 text-white p-8 rounded-xl shadow-lg">
      <h2 class="text-3xl md:text-4xl font-bold mb-3 leading-snug">
         {{ $advantageSection->title }}
      </h2>
      <div class="text-justify opacity-90 py-4 leading-relaxed">
        {!! $advantageSection->description ?? '' !!}
      </div>
    </div>

  </div>
</section>
@endif
