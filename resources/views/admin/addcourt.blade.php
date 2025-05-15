@extends('admin.layouts.master')

@section('conduct')

<div class="w-full min-h-screen bg-gray-950 flex justify-center pt-10 px-4 md:px-8">
    <div class="w-full max-w-3xl bg-gray-900 p-8 rounded-2xl shadow-lg">

        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.mycourts') }}"
                class="inline-block text-sm text-white bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-md transition">
                ← Back
            </a>
        </div>

        <!-- Page Title -->
        <h2 class="text-3xl font-bold mb-8 text-center text-white">Add New Futsal Court</h2>

        <form action="{{route('admin.addcourt')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Court Name -->
            <div>
                <label for="name" class="block mb-1 text-gray-300">Court Name</label>
                <input type="text" id="name" name="court_name" required
                    class="w-full px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block mb-1 text-gray-300">Location</label>
                <input type="text" id="location" name="location" required
                    class="w-full px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block mb-1 text-gray-300">Price per Hour (€)</label>
                <input type="number" id="price" name="price" min="0" required
                    class="w-full px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block mb-1 text-gray-300">Court Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 bg-gray-800 rounded-lg" />
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block mb-1 text-gray-300">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-semibold transition duration-200">
                    Add Court
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
