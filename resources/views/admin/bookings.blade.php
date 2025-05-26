@extends('admin.layouts.master')

@section('conduct')

<!-- Main Content -->

<div class="min-h-screen w-full bg-gray-950 flex flex-col items-center pt-12 mt-16 lg:mt-0 px-4 sm:px-6 lg:px-8">
    
    @if (session('success'))
        <div class="text-green-500 mb-4">{{ session('success') }}</div>
    @endif
    
    @if (session('error'))
        <div class="text-red-500 mb-4">{{ session('error') }}</div>
    @endif

<div class="w-full max-w-7xl flex justify-start mb-6">
    <div class="inline-flex items-center border border-gray-700 rounded-full overflow-hidden bg-gray-800 shadow-md">
        <a href="{{ route('admin.bookings', ['status' => 'Pending']) }}"
            class="flex items-center gap-2 px-5 py-2 text-sm font-semibold transition-colors duration-200
                {{ $status === 'Pending' ? 'bg-yellow-500 text-black' : 'text-gray-300 hover:bg-gray-700' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Pending
        </a>

        <a href="{{ route('admin.bookings', ['status' => 'Confirmed']) }}"
                class="flex items-center gap-2 px-5 py-2 text-sm font-semibold transition-colors duration-200
                    {{ $status === 'Confirmed' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />
            </svg>
            Confirmed
        </a>
    </div>
</div>

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
                        <th class="py-3 px-4 text-left">Action</th>
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
                            <td class="py-3 px-4 text-green-400 font-medium">{{$booking->status}}</td>
                            <td class="px-4 py-2 flex gap-2">
                                @if ($status === 'Pending' || $status === 'PendingPayment')
                                    <form method="POST" action="{{ route('admin.bookings.approve', $booking->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded" type="submit">
                                            Approve
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.bookings.reject', $booking->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded" type="submit">
                                            Reject
                                        </button>
                                    </form>
                                    @elseif ($status === 'Confirmed')
                                    <button 
                                        onclick="openModal('{{ $booking->id }}')" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded inline-block text-center">
                                        View
                                    </button>
                                @endif
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


@foreach ($bookings as $booking)
    <!-- Booking Row (Already included above) -->

    <!-- Modal for Booking View -->
    <div 
        id="modal-{{ $booking->id }}" 
        class="fixed z-50 inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-gray-900 text-white rounded-lg p-6 w-full max-w-md shadow-lg relative">
            <button 
                onclick="closeModal('{{ $booking->id }}')" 
                class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">&times;</button>

            <h2 class="text-2xl font-bold mb-4">Booking Details</h2>
            <div class="space-y-2 text-sm">
                <p><strong>User:</strong> {{ $booking->user->full_name ?? 'N/A' }}</p>
                <p><strong>Court:</strong> {{ $booking->court->court_name ?? 'N/A' }}</p>
                <p><strong>Date:</strong> {{ $booking->date }}</p>
                <p><strong>Time:</strong> {{ $booking->time }}</p>
                <p><strong>Amount:</strong> {{ $booking->price }}</p>
                <p><strong>Payment:</strong> {{ $booking->payment }}</p>
                <p><strong>Status:</strong> {{ $booking->status }}</p>
            </div>
        </div>
    </div>
@endforeach

<script>
    function openModal(id) {
        document.getElementById(`modal-${id}`).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).classList.add('hidden');
    }
</script>


@endsection
