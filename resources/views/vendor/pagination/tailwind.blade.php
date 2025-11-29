@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-8">
        <ul class="flex items-center space-x-2 bg-[#1a1f2b] px-4 py-3 rounded-xl shadow-lg">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 rounded-md bg-[#2a2f3d] text-gray-500 cursor-not-allowed">‹</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-2 rounded-md bg-[#2a2f3d] hover:bg-[#3a4152] text-gray-200 transition">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="px-3 py-2 text-gray-500">...</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        {{-- Active Page --}}
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 rounded-md bg-blue-600 text-white font-semibold shadow">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-4 py-2 rounded-md bg-[#2a2f3d] hover:bg-[#3a4152] text-gray-200 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif

                    @endforeach
                @endif

            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-2 rounded-md bg-[#2a2f3d] hover:bg-[#3a4152] text-gray-200 transition">
                        ›
                    </a>
                </li>
            @else
                <li class="px-3 py-2 rounded-md bg-[#2a2f3d] text-gray-500 cursor-not-allowed">›</li>
            @endif

        </ul>
    </nav>
@endif
