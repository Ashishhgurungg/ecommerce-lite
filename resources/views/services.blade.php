@include('headerfooter.boiler')
<body class="flex flex-col min-h-screen bg-[#0e121c] text-[#d6dfed]">

    @include('headerfooter.header')

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <main class="flex-grow p-6 flex flex-col items-center">

        {{-- Page Header --}}
        <h1 class="text-4xl font-bold underline tracking-wide mb-2">Services</h1>
        <p class="mt-2 text-[#aab4c4] text-lg">Explore the services we offer.</p>

        {{-- Services Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10 w-full max-w-7xl">

            @forelse ($services ?? [] as $service)

                <article class="bg-[#1d2233] border border-[#2a3145] p-5 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.02] transition-all duration-300">

                    {{-- Image --}}
                    @if($service->image_path && file_exists(storage_path('app/public/services/' . $service->image_path)))
                        <img src="{{ asset('storage/services/' . $service->image_path) }}" 
                             alt="{{ $service->name }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" 
                             alt="No image available" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif

                    {{-- Title --}}
                    <h2 class="text-xl font-semibold mb-2 text-white tracking-wide">
                        {{ $service->name }}
                    </h2>

                    {{-- Description with Alpine.js --}}
                    <div x-data="{ expanded: false }" class="mb-4">

                        <p class="text-[#b7bfcc] text-sm leading-relaxed">

                            <!-- Short snippet -->
                            <span x-show="!expanded">
                                {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 120, '...') }}
                            </span>

                            <!-- Full description -->
                            <span x-show="expanded">
                                {!! $service->description !!}
                            </span>

                        </p>

                        <!-- Toggle Button -->
                        <button 
                            class="text-blue-400 mt-2 hover:underline text-sm"
                            @click="expanded = !expanded"
                            x-text="expanded ? 'Read Less' : 'Read More'">
                        </button>

                    </div>

                    {{-- Price --}}
                    <p class="text-blue-400 font-semibold text-lg">
                        Price: ${{ number_format($service->price, 2) }}
                    </p>

                </article>

            @empty
                <div class="col-span-full text-center bg-yellow-200 text-yellow-900 px-4 py-3 rounded-lg font-semibold">
                    {{ $message ?? 'No services available.' }}
                </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $services->links('pagination::tailwind') }}
        </div>

    </main>

    @include('headerfooter.footer')

</body>
</html>
