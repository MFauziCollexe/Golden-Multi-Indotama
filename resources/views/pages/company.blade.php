@extends('layouts.app')

@section('content')
    {{-- =========================
         COMPANY PAGE SECTIONS
    ========================== --}}

    {{-- HERO SECTION (static atau wajib muncul) --}}
    @includeIf('sections.company._hero')
    @includeIf('sections.company._aboutus')

    {{-- SECTIONS DARI DATABASE --}}
    @if(isset($sections) && $sections->count() > 0)
        @foreach ($sections as $section)
            {{-- Lewati jika section_name = "hero" agar tidak double --}}
            @if($section->section_name !== 'hero')
                @includeIf('sections.home._' . $section->section_name, ['section' => $section])
            @endif
        @endforeach
    @else
        {{-- Fallback jika belum ada data section --}}
        <div class="text-center py-20 text-gray-500">
            <p>Belum ada konten untuk halaman ini.</p>
        </div>
    @endif
@endsection

<!-- {{-- Pattern dekoratif bawah (repeat otomatis) --}}
    <div class="absolute bottom-0 left-0 w-full h-16 md:h-20" 
         style="
            background-image: url('{{ asset('images/png/backgrounds/bg-gmi-footer.png') }}');
            background-repeat: repeat-x;
            background-size: 500px auto;
            background-position: bottom center;
         ">
    </div> -->