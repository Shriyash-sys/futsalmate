@extends('users.layouts.master')

@section('context')
<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="w-full lg:w-10/12 mx-auto bg-white border border-gray-200 rounded-2xl shadow-sm p-10">
        {{-- Header --}}
        <div class="flex flex-col items-center justify-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Edit Booking</h1>
            <p class="text-gray-500 text-lg">Modify your booking details below</p>
        </div>

        {{-- Court Info --}}
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start bg-gray-100 rounded-lg p-6 mb-8">
            <div class="flex items-center space-x-5">
                <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr($booking->court->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $booking->court->name }}</h2>
                    <p class="text-gray-600">{{ $booking->court->location ?? 'No location info' }}</p>
                </div>
            </div>
        </div>

        {{-- Court Photo --}}
        @if($booking->court->photo)
            <div class="mb-10">
                <img src="{{ asset('storage/' . $booking->court->photo) }}" alt="Court Photo"
                     class="w-full rounded-lg object-cover max-h-[400px] mx-auto shadow">
            </div>
        @endif

        {{-- Booking Edit Form --}}
        <form action="{{ route('booking.update', $booking->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Date --}}
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date" id="date"
                           value="{{ old('date', $booking->date) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                {{-- Start Time --}}
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                    <input type="time" name="start_time" id="start_time"
                        value="{{ old('start_time', \Carbon\Carbon::parse($booking->start_time)->format('H:i')) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                {{-- End Time --}}
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                    <input type="time" name="end_time" id="end_time"
                        value="{{ old('end_time', \Carbon\Carbon::parse($booking->end_time)->format('H:i')) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>
            </div>

            {{-- Submit + Cancel --}}
            <div class="flex justify-center gap-4 pt-6">
                <a href="{{ route('mybookings') }}"
                    class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-base font-medium transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md text-base font-medium transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
