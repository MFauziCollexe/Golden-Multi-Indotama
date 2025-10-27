<section class="relative bg-cover bg-center bg-no-repeat text-white"
         style="background-image: url('{{ asset('images/png/backgrounds/bg-gmi-hero.png') }}');">

    {{-- Overlay transparan --}}
    <div class="absolute inset-0 bg-black/40"></div>

    {{-- Kontainer utama --}}
    <div class="relative z-10 flex flex-col items-center justify-center text-center px-6 py-32 md:py-48">
        
        {{-- Kotak blur naik --}}
        <div class="absolute bg-[#0F172A]/45 backdrop-blur-md rounded-xl shadow-xl 
                    w-[90%] md:w-[1027px] h-auto md:h-[267px] 
                    flex flex-col items-center justify-center text-center 
                    mx-auto p-6 md:p-10 max-w-3xl 
                    -translate-y-28"> {{-- ini yang bikin kotaknya naik --}}
            
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight uppercase mb-3">
                SOLUSI <br> RANTAI DINGIN <br>
                <span class="text-yellow-400">BERBASIS TEKNOLOGI DIGITAL</span>
            </h1>
            
            <p class="text-gray-200 text-sm md:text-base max-w-2xl">
                Kami menyediakan layanan cold storage modern untuk meningkatkan efisiensi logistik anda
            </p>
        </div>

        {{-- Tombol di bawah kotak --}}
        <a href="#"
           class="relative mt-72 bg-blue-600 hover:bg-yellow-400 hover:text-black text-white 
                  px-6 py-3 rounded-full text-sm md:text-base font-semibold transition duration-300">
            Baca Lebih Lanjut >
        </a>
    </div>

    <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-b from-transparent to-gray-100"></div>
    
</section>
