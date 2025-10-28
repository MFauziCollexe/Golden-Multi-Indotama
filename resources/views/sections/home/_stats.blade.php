@php
  $stats = json_decode($section->json_text ?? '[]', true);
@endphp

<section id="stats"
  class="bg-gray-100 py-10 text-blue-900 px-4 md:px-20"
  x-data
  x-init="
    const section = $el;
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          section.querySelectorAll('.stat-item').forEach(item => {
            const circle = item.querySelector('.circle-progress');
            const counter = item.querySelector('.counter');
            const target = +counter.dataset.target;
            const duration = 2000; // 2 detik

            const radius = circle.r.baseVal.value;
            const circumference = 2 * Math.PI * radius;

            circle.style.strokeDasharray = circumference;
            circle.style.strokeDashoffset = circumference;

            let startTime = null;
            const animate = (timestamp) => {
              if (!startTime) startTime = timestamp;
              const progress = Math.min((timestamp - startTime) / duration, 1);

              // update lingkaran (garis biru)
              circle.style.strokeDashoffset = circumference * (1 - progress);

              // update angka
              const current = Math.floor(progress * target);
              counter.textContent = current.toLocaleString();

              if (progress < 1) {
                requestAnimationFrame(animate);
              } else {
                counter.textContent = target.toLocaleString();
              }
            };
            requestAnimationFrame(animate);
          });
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    observer.observe(section);
  ">

  <div class="max-w-screen-xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 md:gap-20 justify-items-center">
    @foreach ($stats as $item)
      <div class="stat-item flex flex-col items-center text-center">
        <div class="relative w-24 h-24 md:w-28 md:h-28">
          <svg class="w-full h-full" viewBox="0 0 160 160">
            <circle
              stroke="#E5E7EB"
              stroke-width="8"
              fill="transparent"
              r="70"
              cx="80"
              cy="80"
            ></circle>
            <circle
              class="circle-progress text-blue-700"
              stroke="currentColor"
              stroke-width="8"
              fill="transparent"
              r="70"
              cx="80"
              cy="80"
              stroke-linecap="round"
              style="stroke-dasharray: 440; stroke-dashoffset: 440; transform: rotate(-90deg); transform-origin: 50% 50%;"
            ></circle>
          </svg>

          <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-xl md:text-lg font-extrabold counter" data-target="{{ $item['value'] }}">0</span>
            <span class="text-lg md:text-xl font-extrabold text-blue-800 ml-1">+</span>
          </div>
        </div>
        <p class="mt-1 text-xs md:text-sm font-semibold text-blue-900">
          {{ $item['text'] }}
        </p>
      </div>
    @endforeach
  </div>
</section>
