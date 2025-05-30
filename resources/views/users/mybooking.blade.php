    @extends('users.layouts.master')

    @section('context')
        <div class="flex h-screen overflow-hidden">
            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-100">
                <div class="py-6">
                    <div class="px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900 text-center pb-4">My Bookings</h1>
                    </div>
                    <div class="px-4 sm:px-6 md:px-8">
                        <div class="bg-white shadow overflow-hidden sm:rounded-md mb-6">
                            <ul class="divide-y divide-gray-200">
                                @forelse ($bookings as $booking)
                                    <li class="px-4 py-5 sm:px-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="flex-shrink-0 bg-green-500 rounded-full w-12 h-12 flex items-center justify-center text-white font-semibold">
                                                    {{ strtoupper(substr($booking->court->court_name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-medium text-gray-900">
                                                        {{ $booking->court->court_name }}</h3>
                                                    <p class="text-sm text-gray-500">{{ $booking->id }}</p>
                                                    <p class="text-sm text-gray-400">
                                                        {{ $booking->court->location ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm text-gray-600">{{ $booking->date }}</p>
                                                <p class="text-sm font-semibold text-gray-800">{{ $booking->time }}</p>
                                                <span
                                                    class="inline-flex @if ($booking->status == 'pending') bg-red-100 @endif items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-1">
                                                    {{ $booking->status }}
                                                </span>
                                                <div class="mt-2 flex justify-end space-x-2">
                                                    <a class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                                        href="{{ route('viewBooking', $booking->id) }}">
                                                        View
                                                    </a>
                                                    <form action="{{ route('deleteBooking', $booking->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                                            type="submit">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                            </ul>
                            <!-- Empty State -->
                            <div class="px-6 py-12 text-center">
                                <svg class="h-16 w-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-gray-700">No Bookings Found</h3>
                                <p class="mt-2 text-gray-500">You don't have any bookings yet.</p>
                                <div class="mt-6">
                                    <a class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                        href="{{ route('bookcourt') }}">
                                        Book a Court Now
                                    </a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @endsection
