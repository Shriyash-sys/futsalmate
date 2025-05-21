@extends('users.layouts.master')

@section('context')
<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="w-full lg:w-10/12 mx-auto bg-white border border-gray-200 rounded-2xl shadow-sm p-10">
        {{-- Header --}}
        <div class="flex flex-col items-center justify-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Booking Details</h1>
            <p class="text-gray-500 text-lg">Here is the summary of your court booking</p>
        </div>

        {{-- Top: Court Info + Status --}}
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start bg-gray-100 rounded-lg p-6 mb-8">
            <div class="flex items-center space-x-5">
                <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr($viewBooking->court->court_name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $viewBooking->court->court_name }}</h2>
                    <p class="text-gray-600">{{ $viewBooking->court->location ?? 'No location info' }}</p>
                </div>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="inline-block px-4 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                    Confirmed
                </span>
            </div>
        </div>

        {{-- Court Photo Section --}}
            <div class="mb-10">
                <img src="{{ asset('storage/' . $viewBooking->court->image_path) }}" alt="Court Photo"
                    class="w-full rounded-lg object-cover max-h-[400px] mx-auto shadow">
            </div>

        {{-- Booking Info Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <p class="text-sm text-gray-500">Date</p>
                <p class="text-xl font-semibold text-gray-800">
                    {{ \Carbon\Carbon::parse($viewBooking->date)->format('F d, Y') }}
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <p class="text-sm text-gray-500">Time</p>
                <p class="text-xl font-semibold text-gray-800">
                    {{ ($viewBooking->time) }}
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <p class="text-sm text-gray-500">Payment Method</p>
                <p class="text-xl font-semibold text-gray-800">
                    {{ $viewBooking->payment }}
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <p class="text-sm text-gray-500">Amount</p>
                <p class="text-xl font-semibold text-gray-800">
                    {{ $viewBooking->court->price }}
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <p class="text-sm text-gray-500">Booked By</p>
                <p class="text-xl font-semibold text-gray-800">
                    {{ $viewBooking->user->full_name ?? 'You' }}
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <p class="text-sm text-gray-500">Booking ID</p>
                <p class="text-xl font-semibold text-gray-800">
                    {{ $viewBooking->id }}
                </p>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex justify-center gap-4">
            <a href="{{ route('mybookings', auth()->user()->id) }}" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg text-base font-medium transition">
                Back
            </a>
            <a href="{{ route('editBookingForm', $viewBooking->id)}}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-base font-medium transition">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection
