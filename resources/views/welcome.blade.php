<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hello</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Font Awesome (remove if globally included) --}}
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />

  <style>
    /* Ensure full overflow visibility and page font */
    html, body { width: 100%; overflow-x: visible !important; }
    body { font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; margin:0; background: #0e121c; color: #d6dfed; min-height:100vh; }
  </style>
</head>

<body class="antialiased m-0 bg-[#0e121c] text-[#d6dfed]">

  {{-- HEADER (normal position) --}}
  <header>
    <nav class="flex justify-between items-center px-6 py-3 border-b">
      <div class="flex items-center gap-6">
        <a href="/">
          <img src="{{ asset('images/my-logo.svg') }}" alt="My Logo" class="block h-6 w-auto" />
        </a>
        <a href="" class="hover:text-blue-600">Articles</a>
        <a href="" class="hover:text-blue-600">About</a>
        <a href="" class="hover:text-blue-600">Gallery</a>
        <a href="" class="hover:text-blue-600">Contact</a>
        <a href="" class="hover:text-blue-600">FAQ</a>
      </div>

      @if (Route::has('login'))
      <div class="flex items-center space-x-3">
        @auth
          <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 rounded-sm text-sm leading-normal">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 rounded-sm text-sm leading-normal">Log in</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 rounded-sm text-sm leading-normal">Register</a>
          @endif
        @endauth
      </div>
      @endif
    </nav>
  </header>

  {{-- MAIN CONTENT --}}
  <main class="min-h-[60vh]">
    @yield('content')
  </main>

  {{-- ============================
       FOOTER — placed as direct child of <body>
       Uses fixed for SVG wrapper so it anchors to viewport.
       ============================ --}}
  <footer class="fixed inset-x-0 bottom-0 w-full pb-[100px] flex justify-center items-center pointer-events-auto overflow-visible z-40">
    <!-- SVG wrapper: fixed and extra-wide so it always covers both sides -->
    <div class="fixed left-1/2 -bottom-[69px] -translate-x-1/2 w-[200vw] h-[520px] pointer-events-none -z-10 overflow-visible" aria-hidden="true">
      <svg
        version="1.1"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 0 1600 900"
        class="absolute bottom-0 max-h-[520px] min-h-[420px] scale-y-[3] scale-x-[2.25] origin-bottom pointer-events-none"
        style="width:100%; height:100%;"
      >
        <defs>
          <path id="wave" fill="rgba(11, 89, 255, 0.6)"
            d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
            s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>

        <g>
          <use xlink:href="#wave" opacity=".4">
            <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
              calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
              keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
          </use>

          <use xlink:href="#wave" opacity=".6">
            <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
              calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
              keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
          </use>

          <use xlink:href="#wave" opacty=".9">
            <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="4s"
              calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
              keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
          </use>
        </g>
      </svg>
    </div>

    <!-- Footer content -->
    <section class="flex flex-col items-center gap-[30px] w-full max-w-[1200px] px-4">
      <ul class="flex gap-[10px] m-0 p-0">
        <li>
          <a href="#" class="fa-brands fa-github text-[24px] grid place-items-center w-[40px] h-[40px] rounded-full bg-[rgb(255_255_255_/_0.06)] backdrop-blur-[10px] transition transform hover:scale-105 hover:shadow-[0_6px_18px_rgba(11,89,255,0.12)]"></a>
        </li>
        <li>
          <a href="#" class="fa-brands fa-codepen text-[24px] grid place-items-center w-[40px] h-[40px] rounded-full bg-[rgb(255_255_255_/_0.06)] backdrop-blur-[10px] transition transform hover:scale-105 hover:shadow-[0_6px_18px_rgba(11,89,255,0.12)]"></a>
        </li>
        <li>
          <a href="#" class="fa-brands fa-dribbble text-[24px] grid place-items-center w-[40px] h-[40px] rounded-full bg-[rgb(255_255_255_/_0.06)] backdrop-blur-[10px] transition transform hover:scale-105 hover:shadow-[0_6px_18px_rgba(11,89,255,0.12)]"></a>
        </li>
        <li>
          <a href="#" class="fa-brands fa-instagram text-[24px] grid place-items-center w-[40px] h-[40px] rounded-full bg-[rgb(255_255_255_/_0.06)] backdrop-blur-[10px] transition transform hover:scale-105 hover:shadow-[0_6px_18px_rgba(11,89,255,0.12)]"></a>
        </li>
      </ul>

      <ul class="flex gap-[14px] list-none p-0 m-0">
        <li><a class="hover:underline cursor-pointer">Home</a></li>
        <li><a class="hover:underline cursor-pointer">About</a></li>
        <li><a class="hover:underline cursor-pointer">Portfolio</a></li>
        <li><a class="hover:underline cursor-pointer">Skills</a></li>
        <li><a class="hover:underline cursor-pointer">Contact</a></li>
      </ul>

      <p class="text-[12px] text-[#a2b6e1] m-0">© 2025 All rights reserved</p>
    </section>
  </footer>
</body>
</html>
