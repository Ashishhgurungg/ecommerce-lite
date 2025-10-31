@include('headerfooter.boiler')
<body class="flex flex-col min-h-screen bg-[#0e121c] text-[#d6dfed]">
  @include('headerfooter.header')
  
  <main class="flex-grow p-6">


    <h1 class="text-3xl font-bold underline">Services</h1>
    <p class="mt-4">Welcome to the Services page.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @foreach ($services as $service)
        <article class="bg-[#1a1f2b] p-4 rounded shadow hover:shadow-lg transition">
            @if($service->image_path && file_exists(storage_path('app/public/services/' . $service->image_path)))
              <img src="{{ asset('storage/services/' . $service->image_path) }}" 
                  alt="{{ $service->name }}" 
                  class="w-full h-40 object-cover rounded mb-4" 
                  width="200" 
                  height="200">
            @else
              {{-- Fallback image if none exists --}}
              <img src="{{ asset('images/default.jpg') }}" 
                  alt="No image available" 
                  class="w-full h-40 object-cover rounded mb-4" 
                  width="400" 
                  height="300">
              @endif

            <h2 class="text-xl font-semibold mb-2">{{ $service->name }}</h2>
            <p class="text-[#b0b8c1]">{{ $service->description }}</p>
        </article>
        @endforeach
    </div>
</main>

  @include('headerfooter.footer')

</body>
</html>