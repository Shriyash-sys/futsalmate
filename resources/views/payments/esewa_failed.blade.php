@extends('users.layouts.master')

@section('context')
    <div class="min-h-screen flex items-center justify-center bg-red-50">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-md text-center">
            <div class="text-red-600 text-5xl mb-4">
                <i class="fas fa-times-circle"></i> {{-- FontAwesome Icon --}}
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Transaction Failed</h2>
            <p class="text-gray-600 mb-4">We're sorry, but your eSewa payment could not be completed.</p>
            <a class="inline-block px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600"
                href="{{ route('userDashboard') }}">Return
                to Home</a>
        </div>
    </div>
@endsection
