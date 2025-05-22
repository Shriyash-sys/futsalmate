@extends('admin.layouts.master')

@section('conduct')

<!-- Main Content -->
<div class="min-h-screen w-full bg-gray-950 flex flex-col items-center pt-12 mt-16 lg:mt-0 px-4 sm:px-6 lg:px-8">

    <!-- Bookings Section -->
    <div class="w-full max-w-7xl bg-gray-900 rounded-2xl shadow-xl overflow-hidden">

        <!-- Header -->
        <div class="p-4 sm:p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-gray-800">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">Bookings</h2>
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
                        <th class="py-3 px-4 text-left">Payment Method</th>
                        <th class="py-3 px-4 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr class="border-t border-gray-800 hover:bg-gray-800/50 transition duration-150">
                            <td class="py-3 px-4">{{ $booking->user->full_name ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->court->court_name ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->date ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->time ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->price ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $booking->payment ?? 'N/A' }}</td>
                            <td class="py-3 px-4 text-green-400 font-medium">Confirmed</td>
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
