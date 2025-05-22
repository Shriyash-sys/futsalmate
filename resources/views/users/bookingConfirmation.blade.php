@extends('users.layouts.master')

@section('context')
    <div class="flex h-screen overflow-hidden">
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-100">
            <div class="py-6">
                <div class="max-w-3xl mx-auto px-4 sm:px-6 md:px-8">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-6">
                            <svg class="h-12 w-12 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900">Booking Confirmed!</h1>
                        <p class="mt-2 text-lg text-gray-600">Your futsal court has been successfully booked.</p>
                    </div>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 bg-secondary text-white">
                            <h3 class="text-lg leading-6 font-medium">Booking Details</h3>
                            <p class="mt-1 max-w-2xl text-sm">Reference this information when you arrive</p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Booking ID</dt>
                                    <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $booking->id }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Court</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $booking->court->court_name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Date</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $booking->date }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Time</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $booking->time }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($booking->status == 'pending') bg-red-100 @endif bg-green-100 text-green-800">{{ $booking->status }}</span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Payment Method</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $booking->payment }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Payment Status</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 @if ($booking->status == 'pending') bg-red-100 @endif text-green-800">{{ $booking->status }}</span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Amount</dt>
                                    <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $booking->price }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:px-6 flex flex-col sm:flex-row gap-4 justify-end">
                            <a class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-secondary bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                href="{{ route('userDashboard', auth()->user()->id) }}">
                                Go to Dashboard
                            </a>
                            <a class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                href="{{ route('mybookings', auth()->user()->id) }}">
                                View All Bookings
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Important Information</h3>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                            <div class="space-y-4 text-sm text-gray-600">
                                <p>• Please arrive at least 15 minutes before your scheduled time.</p>
                                <p>• Bring your booking ID or confirmation email for verification.</p>
                                <p>• Proper sports attire and footwear are required.</p>
                                <p>• Cancellations must be made at least 24 hours in advance for a full refund.</p>
                                <p>• For any questions or assistance, please contact us at support@futsalmate.com or call
                                    +977 9812345678.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
@endsection
