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
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    </div>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                </div>
                {{-- <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" value="true" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div> --}}

                <div class="flex items-center justify-between text-sm text-gray-400">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-blue-600 bg-gray-800 border-gray-700 rounded"/>
                        <span class="ml-2">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-primary hover:text-primary-dark">Forgot password?</a>
                </div>
                <div>
                    <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-4 rounded-lg transition duration-300">Login</button>
                </div>
            </form>
            <div class="text-center mt-6">
                <p class="text-gray-600">Don't have an account? <a href="{{route('signupForm')}}" class="text-primary hover:text-primary-dark font-medium">Register</a></p>
            </div>
            <div class="mt-8">
            <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button type="button" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.164 6.839 9.489.5.09.682-.217.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.34-3.369-1.34-.454-1.157-1.11-1.465-1.11-1.465-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.022A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.577.688.48C19.137 20.16 22 16.418 22 12c0-5.523-4.477-10-10-10z" />
                        </svg>
                    </button>
                    <button type="button" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg class="h-5 w-5 text-[#4285F4]" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.545 12.151L12 12.005l-.545.146c-1.367.365-4.383 1.528-4.383 3.477v2.309h9.855v-2.309c0-1.949-3.015-3.112-4.382-3.477zM12 11c1.93 0 3.5-1.57 3.5-3.5S13.93 4 12 4 8.5 5.57 8.5 7.5 10.07 11 12 11z" />
                        </svg>
                    </button>
                </div>
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

