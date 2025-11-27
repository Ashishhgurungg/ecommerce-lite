@include('headerfooter.boiler')
<body class="flex flex-col min-h-screen bg-[#0e121c] text-[#d6dfed]">
  @include('headerfooter.header')
  <main class="flex-grow p-6">
        <h1 class="text-3xl font-bold underline">Articles page</h1>
        <p class="mt-4">Welcome to the Articles page.</p>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @forelse ($articles?? [] as $article)
        <article class="bg-[#1a1f2b] p-4 rounded shadow hover:shadow-lg transition">
            @if($article->image_path && file_exists(storage_path('app/public/articles/' . $article->image_path)))
              <img src="{{ asset('storage/articles/' . $article->image_path) }}" 
                  alt="{{ $article->name }}" 
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

            <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
            <p class="text-[#b0b8c1]">{{ $article->description }}</p>
        </article>
        
       @empty
      <div class="text-center bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-6">
          {{ $message ?? 'No articlesavailable.' }}
      </div>
      @endforelse
      
    </div>

    <div class="mt-6">
    {{ $articles->links('pagination::tailwind') }}
    </div>
    </main>

  @include('headerfooter.footer')

</body>
</html>