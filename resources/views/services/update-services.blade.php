<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/update-services') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                @csrf
                <input type="hidden" name="id" value="{{ $service->id }}">

                <label class="block mb-2 font-medium">Service Name:</label>
                <input type="text" name="name" value="{{ old('name', $service->name) }}" class="w-full p-2 border rounded" required>

                <label class="block mt-4 mb-2 font-medium">Service Description:</label>
                <textarea name="description" class="w-full p-2 border rounded" rows="3">{{ old('description', $service->description) }}</textarea>

                <label class="block mt-4 mb-2 font-medium">Service Image:</label>
                <input type="file" name="image" class="w-full p-2 border rounded">

                @if ($service->image_path)
                    <div class="mt-2 flex items-center gap-4">
                        <img src="{{ asset('storage/services/' . $service->image_path) }}" alt="Service Image" class="w-32 h-32 object-cover rounded">

                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remove_image" value="1" class="form-checkbox">
                            <span class="ml-2 text-gray-700">Remove existing image</span>
                        </label>
                    </div>
                @endif

                <label class="block mt-4 mb-2 font-medium">Price:</label>
                <input type="number" name="price" value="{{ old('price', $service->price) }}" class="w-full p-2 border rounded" required>

                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update Service
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
