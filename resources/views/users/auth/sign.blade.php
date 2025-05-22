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
    
    <!-- Register Form -->
    <div class="flex min-h-[calc(100vh-76px)]">
        <div class="hidden lg:block lg:w-1/2 auth-pattern">
            <div class="flex items-center justify-center h-full px-20">
                <div class="text-white">
                    <h2 class="text-4xl font-bold mb-6">Join Futsal Mate Today!</h2>
                    <p class="text-xl mb-8">Create an account to start booking courts, managing your games, and enjoying exclusive benefits.</p>
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="bg-secondary-light p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span>Book courts anytime, anywhere</span>
                    </div>
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="bg-secondary-light p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span>Manage your bookings easily</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-secondary-light p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span>Get special member discounts</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-secondary mb-2">Create Your Account</h1>
                    <p class="text-gray-600">Fill in your details to get started</p>
                </div>
                <form action="{{route('register')}}" method="post" class="space-y-4">
                @csrf
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="full_name" name="full_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" id="confirm_password" name="password_confirmation" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">I agree to the <a href="#" class="text-primary hover:text-primary-dark">Terms and Conditions</a></label>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-4 rounded-lg transition duration-300">Create Account</button>
                    </div>
                </form>
                <div class="text-center mt-6">
                    <p class="text-gray-600">Already have an account? <a href="{{route('loginForm')}}" class="text-primary hover:text-primary-dark font-medium">Login</a></p>
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