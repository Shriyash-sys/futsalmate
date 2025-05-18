@extends('admin.layouts.master')

@section('conduct')

<!-- Main Content -->
<div class="h-full w-full bg-gray-950 flex flex-col items-center pt-12 px-6">

    <!-- Bookings Section -->
    <div class="w-full max-w-6xl bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
    
        <!-- Header -->
        <div class="p-6 flex justify-between items-center border-b border-gray-800">
            <h2 class="text-3xl font-bold text-white">Bookings</h2>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">+ New Booking</button>
        </div>

        <!-- Bookings Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-white">
                <thead class="bg-gray-800 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="py-3 px-4 text-left">User</th>
                        <th class="py-3 px-4 text-left">Court</th>
                        <th class="py-3 px-4 text-left">Date</th>
                        <th class="py-3 px-4 text-left">Time</th>
                        <th class="py-3 px-4 text-left">Amount</th>
                        <th class="py-3 px-4 text-left">Payment Status</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr class="border-t border-gray-800 hover:bg-gray-800/50 transition duration-150">
                            <td class="py-3 px-4">{{ $booking->user->full_name ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->court ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->date ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->time ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->price ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->payment ?? 'N/A' }}</td>
                            <td class="py-3 px-4 text-green-400 font-medium">Confirmed</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-1 rounded transition">Edit</button>
                                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded transition">Cancel</button>
                                <button class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-1 rounded transition">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-gray-400">
                                <div class="flex flex-col items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
                                    </svg>
                                    <p>No bookings have been made yet.</p>
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
