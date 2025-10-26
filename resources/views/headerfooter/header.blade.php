 {{-- HEADER (normal position) --}}
  <header>
    <nav class="flex justify-between items-center px-6 py-3 border-b">
      <div class="flex items-center gap-6">
        <a href="/">
          <img src="{{ asset('images/my-logo.svg') }}" alt="My Logo" class="block h-6 w-auto" />Home
        </a>
        <a href="" class="hover:text-blue-600">Articles</a>
        <a href="{{ url('/about') }}" class="hover:text-blue-600">About</a>
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