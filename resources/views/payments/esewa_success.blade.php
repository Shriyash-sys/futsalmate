@extends('users.layouts.master')

@section('context')
    <div class="min-h-screen flex items-center justify-center bg-green-50">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-xl w-full">
            <div class="text-green-600 text-5xl text-center mb-4">
                <i class="fas fa-check-circle"></i> {{-- FontAwesome Icon --}}
            </div>
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Payment Successful!</h2>
            <p class="text-gray-600 text-center mb-6">Your eSewa payment was completed successfully. Below are the
                transaction details:</p>

            <div class="bg-gray-50 border border-gray-200 rounded-md p-4">
                <ul class="text-sm text-gray-700 space-y-2">
                    <li><strong>Transaction Code:</strong> {{ $data['transaction_code'] ?? 'N/A' }}</li>
                    <li><strong>Status:</strong> {{ $data['status'] ?? 'N/A' }}</li>
                    <li><strong>Total Amount:</strong> Rs. {{ $data['total_amount'] ?? 'N/A' }}</li>
                    <li><strong>Transaction UUID:</strong> {{ $data['transaction_uuid'] ?? 'N/A' }}</li>
                    <li><strong>Product Code:</strong> {{ $data['product_code'] ?? 'N/A' }}</li>
                    <li><strong>Signature:</strong>
                        <span class="block truncate text-xs text-gray-500 mt-1">{{ $data['signature'] ?? 'N/A' }}</span>
                    </li>
                </ul>
            </div>

            <div class="mt-6 text-center">
                <a class="inline-block px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                    href="{{ route('userDashboard') }}">
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
