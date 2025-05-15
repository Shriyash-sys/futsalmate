<!-- Header -->
<header class="bg-secondary text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('logos/futsalmate_logo.png') }}" alt="Futsal Mate Logo" class="h-12 w-auto max-w-[120px] object-contain">
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{route('futsals.index')}}" class="hover:text-primary transition duration-300">Home</a>
                <a href="courts.html" class="hover:text-primary transition duration-300">Courts</a>
                <a href="pricing.html" class="hover:text-primary transition duration-300">Pricing</a>
                <a href="contact.html" class="hover:text-primary transition duration-300">Contact</a>
                <a href="{{ route('loginForm') }}" class="bg-primary hover:bg-primary-dark text-secondary font-bold py-2 px-4 rounded-lg transition duration-300">Login</a>
            </div>
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden pb-4">
            <a href="{{route('futsals.index')}}" class="block py-2 hover:text-primary transition duration-300">Home</a>
            <a href="courts.html" class="block py-2 hover:text-primary transition duration-300">Courts</a>
            <a href="pricing.html" class="block py-2 hover:text-primary transition duration-300">Pricing</a>
            <a href="contact.html" class="block py-2 hover:text-primary transition duration-300">Contact</a>
            <a href="{{ route('loginForm') }}" class="block py-2 mt-2 bg-primary hover:bg-primary-dark text-secondary font-bold text-center rounded-lg transition duration-300">Login</a>
        </div>
    </div>
</header>