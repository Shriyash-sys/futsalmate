@extends('layouts.master')

@section('content')

<!-- Hero Section -->
<section class="hero-pattern text-white py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Book Your <span class="text-primary">Futsal Court</span> Today!</h1>
                <p class="text-lg mb-8">Easy booking, flexible scheduling, and the best courts in town. Join the game now!</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('loginForm') }}" class="bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-6 rounded-lg transition duration-300 text-center">Book Now</a>
                    <a href="{{ route('signupForm') }}" class="bg-transparent hover:bg-white/10 border-2 border-primary text-primary font-bold py-3 px-6 rounded-lg transition duration-300 text-center">Sign Up</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="https://images.unsplash.com/photo-1526232761682-d26e03ac148e?auto=format&fit=crop&w=1029&q=80" alt="Futsal Court" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Why Choose <span class="text-primary">Futsal Mate</span>?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
                <div class="text-primary mb-4">
                    <!-- Clock Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Quick Booking</h3>
                <p class="text-gray-600">Book your favorite court in less than a minute. No hassle, no waiting.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
                <div class="text-primary mb-4">
                    <!-- Payment Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Multiple Payment Options</h3>
                <p class="text-gray-600">Pay with eSewa, Khalti, or cash. Choose what works best for you.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
                <div class="text-primary mb-4">
                    <!-- Settings Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Manage Bookings</h3>
                <p class="text-gray-600">View, edit, or cancel your bookings anytime. Full control at your fingertips.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="bg-white -mx-4 sm:-mx-6 lg:-mx-8 overflow-hidden">
    <div class="w-full h-40 sm:h-56 md:h-72 lg:h-80 xl:h-96 relative">
        <img src="{{ asset('logos/FutsalMate_quote.png') }}" alt="Futsal Mate Quote"
            class="w-full h-full object-cover object-center">
    </div>
</section>

<!-- Courts Section -->
<section class="py-16 bg-gray-100" id="courts">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Exclusive <span class="text-primary">Courts</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($courts as $court)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $court->image_url }}" alt="Court Image" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $court->court_name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $court->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">{{ $court->price }}/hr</span>
                            <a href="{{ route('loginForm') }}" class="bg-secondary hover:bg-primary text-white font-bold py-2 px-4 rounded-lg transition duration-300">Book Now</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">No courts available right now.</p>
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('loginForm') }}" class="inline-block bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-6 rounded-lg transition duration-300">View All Courts</a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-black text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Ready to Play?</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">Join hundreds of futsal enthusiasts already using Futsal Mate. Get started today!</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('loginForm') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg transition duration-300">Book a Court</a>
            <a href="{{ route('signupForm') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary text-white font-bold py-3 px-6 rounded-lg transition duration-300">Create Account</a>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="py-16 bg-white">
    <div class="container mx-auto max-w-xl px-4">
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <div class="bg-black text-white px-6 py-4">
                <h2 class="text-xl font-bold">Contact Us</h2>
                <p class="text-green-400">We'd love to hear from you!</p>
            </div>
            <form method="POST" action="{{route('contact')}}" class="p-6 space-y-6">
            @csrf    
                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="full_name" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Subject</label>
                    <select name="subject" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option>General Inquiry</option>
                        <option>Support Request</option>
                        <option>Feedback</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea rows="4" name="message" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
