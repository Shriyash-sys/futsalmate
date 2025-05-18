@extends('admin.layouts.master')

@section('conduct')

<!-- Main Content -->
<div class="h-full w-full bg-gray-950 flex flex-col items-center pt-12 px-6">

    <!-- My Courts Section -->
    <div class="w-full max-w-6xl bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
    
        <!-- Header with Title -->
        <div class="p-6 flex justify-between items-center border-b border-gray-800">
            <h2 class="text-3xl font-bold text-white">My Courts</h2>
            <a href="{{ route('admin.addcourtForm') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">+ Add New Court</a>
        </div>

        <!-- Court List Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-white">
                <thead class="bg-gray-800 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="py-3 px-4 text-left">Court Name</th>
                        <th class="py-3 px-4 text-left">Location</th>
                        <th class="py-3 px-4 text-left">Price</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courts as $court)
                        <tr class="border-t border-gray-800 hover:bg-gray-800/50 transition duration-150">
                            <td class="py-3 px-4">{{ $court->court_name }}</td>
                            <td class="py-3 px-4">{{ $court->location }}</td>
                            <td class="py-3 px-4 text-green-400">Rs. {{ number_format($court->price, 2) }}</td>
                            <td class="py-3 px-4 text-center">
                                <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded transition duration-200">Edit</button>
                                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded ml-2 transition duration-200">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-10 text-center text-gray-400">
                                <div class="flex flex-col items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4h10z" />
                                    </svg>
                                    <p>No courts found. Click "+ Add New Court" to get started.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
