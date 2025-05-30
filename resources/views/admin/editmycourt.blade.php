@extends('admin.layouts.master')

@section('conduct')
<div class="min-h-screen bg-gray-950 py-10 px-4 sm:px-6 mt-16 lg:mt-0 md:px-8">
    <div class="max-w-3xl mx-auto bg-gray-800 text-white rounded-2xl shadow-lg p-6 sm:p-8 md:p-10">
        <h1 class="text-2xl sm:text-3xl font-bold mb-8 border-b border-gray-700 pb-4">Edit Court</h1>

        <form action="{{ route('admin.editMyCourt', $court->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Court Name -->
            <div>
                <label for="court_name" class="block text-sm text-gray-300 mb-2">Court Name</label>
                <input type="text" name="court_name" id="court_name"
                    value="{{ old('court_name', $court->court_name) }}"
                    class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-sm text-gray-300 mb-2">Location</label>
                <input type="text" name="location" id="location"
                    value="{{ old('location', $court->location) }}"
                    class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm text-gray-300 mb-2">Price</label>
                <input type="number" name="price" id="price" step="0.01"
                    value="{{ old('price', $court->price) }}"
                    class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm text-gray-300 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $court->description) }}</textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm text-gray-300 mb-2">Court Image</label>
                <input type="file" name="image" id="image"
                    class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-600 file:text-white hover:file:bg-green-700"/>

                @if ($court->image_path)
                    <div class="mt-4">
                        <p class="text-sm text-gray-400 mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $court->image_path) }}" alt="Court Image"
                            class="w-full h-48 sm:h-64 object-cover rounded-lg border border-gray-600">
                    </div>
                @endif
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between mt-6">
                <a href="{{ route('admin.mycourts') }}"
                   class="bg-gray-600 hover:bg-gray-500 px-6 py-2 rounded-lg text-white text-center">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded-lg text-white text-center">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
