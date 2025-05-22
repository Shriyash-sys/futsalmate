@extends('admin.layouts.master')

@section('conduct')
<div class="min-h-screen bg-gray-950 py-10 px-4 sm:px-6 mt-16 lg:mt-0 md:px-8">
    <div class="max-w-3xl mx-auto bg-gray-800 text-white rounded-2xl shadow-lg p-6 sm:p-8 md:p-10">
        <h1 class="text-2xl sm:text-3xl font-bold mb-8 border-b border-gray-700 pb-4">Court Details</h1>

        <div class="space-y-6">
            <div>
                <span class="text-sm text-gray-400">Court Name:</span>
                <h2 class="text-xl font-semibold">{{ $court->court_name }}</h2>
            </div>

            <div>
                <span class="text-sm text-gray-400">Location:</span>
                <p class="text-base">{{ $court->location }}</p>
            </div>

            <div>
                <span class="text-sm text-gray-400">Price:</span>
                <p class="text-green-400 font-semibold">Rs. {{ number_format($court->price, 2) }}</p>
            </div>

            <div>
                <span class="text-sm text-gray-400">Description:</span>
                <p class="text-base">{{ $court->description }}</p>
            </div>

            <div>
                <span class="text-sm text-gray-400">Court Image:</span>
                <div class="mt-2">
                    @if($court->image_path)
                        <img src="{{ asset('storage/' . $court->image_path)}}" 
                             alt="Court Image" 
                             class="w-full h-48 sm:h-64 object-cover rounded-lg border border-gray-700 shadow">
                    @else
                        <p class="text-gray-400 italic">No image available.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-between">
            <a href="{{ route('admin.mycourts') }}"
                class="bg-gray-600 hover:bg-gray-500 text-white px-6 py-2 rounded-lg text-center">
                Back
            </a>
            <a href="{{ route('admin.editMyCourtForm', $court->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg text-center">
                Edit Court
            </a>
        </div>
    </div>
</div>
@endsection
