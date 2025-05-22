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
                    <a href="{{route('loginForm')}}" class="bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-6 rounded-lg transition duration-300 text-center">Book Now</a>
                    <a href="{{route('signupForm')}}" class="bg-transparent hover:bg-white/10 border-2 border-primary text-primary font-bold py-3 px-6 rounded-lg transition duration-300 text-center">Sign Up</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="https://images.unsplash.com/photo-1526232761682-d26e03ac148e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1029&q=80" alt="Futsal Court" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">

        <h2 class="text-3xl font-bold text-center mb-12">Why Choose <span class="text-primary">Futsal Mate</span>?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
              <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
                  <div class="text-primary mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                  </div>
                  <h3 class="text-xl font-semibold mb-2">Quick Booking</h3>
                  <p class="text-gray-600">Book your favorite court in less than a minute. No hassle, no waiting.</p>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
                  <div class="text-primary mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                      </svg>
                  </div>
                  <h3 class="text-xl font-semibold mb-2">Multiple Payment Options</h3>
                  <p class="text-gray-600">Pay with eSewa, Khalti, or cash. Choose what works best for you.</p>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-primary">
                  <div class="text-primary mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                      </svg>
                  </div>
                  <h3 class="text-xl font-semibold mb-2">Manage Bookings</h3>
                  <p class="text-gray-600">View, edit, or cancel your bookings anytime. Full control at your fingertips.</p>
              </div>
          </div>
      </div>
  </section>

<!-- Courts Section -->
<section class="py-16 bg-gray-100" id="courts">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Exclusive<span class="text-primary">Courts</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse ($courts as $court)
            <!-- Courts -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{$court->image_url}}" alt="Court 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{$court->court_name}}</h3>
                    <p class="text-gray-600 mb-4">{{$court->description}}.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">{{$court->price}}/hr</span>
                        <a href="{{route('loginForm')}}" class="bg-secondary hover:bg-primary text-white font-bold py-2 px-4 rounded-lg transition duration-300">Book Now</a>
                    </div>
                </div>
            </div>
            @empty
                <p>No courts.</p>

        @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{route('loginForm')}}" class="inline-block bg-primary hover:bg-primary-dark text-secondary font-bold py-3 px-6 rounded-lg transition duration-300">View All Courts</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">What Our <span class="text-primary">Players Say</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center mr-4">
                        <span class="text-xl font-bold">R</span>
                    </div>
                    <div>
                        <h4 class="font-semibold">Rajesh Sharma</h4>
                        <div class="flex text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"The booking system is so easy to use! I can quickly check availability and book my favorite court in seconds."</p>
            </div>
        </dv>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-black from-secondary to-primary text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Ready to Play?</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">Join hundreds of futsal enthusiasts already using Futsal Mate. Get started today!</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('loginForm') }}" class="bg-black border-2 hover:bg-primary hover:text-white text-primary font-bold py-3 px-6 rounded-lg transition duration-300">Book a Court</a>
            <a href="{{ route('signupForm') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary text-white font-bold py-3 px-6 rounded-lg transition duration-300">Create Account</a>
        </div>
    </div>
</section>

<script>
      // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

@endsection