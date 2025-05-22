@extends('layouts.master')
@section('content')

<style>
body {
    font-family: 'Inter', sans-serif;
}
.auth-pattern {
    background-color: #0e1211;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2377f07b' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>

<body class="bg-gray-100 min-h-screen">

<!-- Login Form -->
<div class="flex min-h-[calc(100vh-76px)]">
    <div class="hidden lg:block lg:w-1/2 auth-pattern">
        <div class="flex items-center justify-center h-full px-20">
            <div class="text-white">
                <h2 class="text-4xl font-bold mb-6">Welcome Back!</h2>
                <p class="text-xl mb-8">Log in to your account to book courts, manage your reservations, and more.</p>
                <div class="flex items-center space-x-4 mb-6">
                    <div class="bg-secondary-light p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span>Easy booking management</span>
                </div>
                <div class="flex items-center space-x-4 mb-6">
                    <div class="bg-secondary-light p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span>Multiple payment options</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-secondary-light p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span>Exclusive member benefits</span>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="max-w-md w-full">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-secondary mb-2">Login to Your Account</h1>
                <p class="text-gray-600">Enter your credentials to access your account</p>
            </div>
            <form action="{{route('login')}}" method="post" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                </div>
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    </div>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                </div>
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <div class="flex items-center justify-between text-sm text-gray-400">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-blue-600 bg-gray-800 border-gray-700 rounded"/>
                        <span class="ml-2">Remember me</span>
                    </label>
                </div>
                <div>
                    <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-4 rounded-lg transition duration-300">Login</button>
                </div>
            </form>
            <div class="text-center mt-6">
                <p class="text-gray-600">Don't have an account? <a href="{{route('signupForm')}}" class="text-primary hover:text-primary-dark font-medium">Register</a></p>
            </div>
        </div>
    </div>
</div>

<script>
      // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
@endsection

