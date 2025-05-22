<!-- Header -->
<header class="bg-secondary text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('logos/futsalmate_logo.png') }}" alt="Futsal Mate Logo" class="h-12 w-auto max-w-[120px] object-contain">
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('futsals.index') }}" class="hover:text-primary transition duration-300">Home</a>
                <a href="#features" class="hover:text-primary transition duration-300">Features</a>
                <a href="#courts" class="hover:text-primary transition duration-300">Courts</a>
                <a href="#contact" class="hover:text-primary transition duration-300">Contact</a>
                <a href="{{ route('loginForm') }}" class="bg-primary hover:bg-primary-dark text-secondary font-bold py-2 px-4 rounded-lg transition duration-300">Login</a>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden flex flex-col space-y-2 pb-4">
            <a href="{{ route('futsals.index') }}" class="block py-2 px-2 hover:text-primary transition duration-300">Home</a>
            <a href="#features" class="block py-2 px-2 hover:text-primary transition duration-300">Features</a>
            <a href="#courts" class="block py-2 px-2 hover:text-primary transition duration-300">Courts</a>
            <a href="#contact" class="block py-2 px-2 hover:text-primary transition duration-300">Contact</a>
            <a href="{{ route('loginForm') }}" class="block py-2 mt-2 mx-2 bg-primary hover:bg-primary-dark text-secondary font-bold text-center rounded-lg transition duration-300">Login</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            toggleBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });

            // Optional: Hide menu after clicking any link
            const links = mobileMenu.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        });
    </script>
</header>
