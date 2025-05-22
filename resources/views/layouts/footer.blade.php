<!-- Footer -->
<footer class="bg-secondary-light text-white py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center">
                <img src="{{ asset('logos/futsalmate_logo.png') }}" alt="Futsal Mate Logo" class="h-12 w-auto max-w-[120px] object-contain">
                </h3>
                <p class="text-gray-400">The best futsal booking system in town. Easy, fast, and reliable.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{route('futsals.index')}}" class="text-gray-400 hover:text-primary transition duration-300">Home</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-primary transition duration-300">Features</a></li>
                    <li><a href="#courts" class="text-gray-400 hover:text-primary transition duration-300">Courts</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-primary transition duration-300">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">FAQs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        Bharatpur-1, Chitwan
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        +977 9845964778
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        info@futsalmate.com
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 FutsalMate. All rights reserved.</p>
        </div>
    </div>
</footer>