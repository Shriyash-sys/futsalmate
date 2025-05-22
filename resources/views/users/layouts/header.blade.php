<!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-secondary">
                <div class="flex items-center justify-center h-16 px-4 bg-secondary-light">
                    <div class="flex items-center">
                    <img src="{{ asset('logos/futsalmate_logo.png') }}" alt="Futsal Mate Logo" class="h-12 w-auto max-w-[120px] object-contain">
                    </div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-6 overflow-y-auto">
        <div class="flex flex-col flex-grow">
        <nav class="flex-1 space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('userDashboard', auth()->user()->id) }}"
            class="flex items-center px-4 py-3 rounded-lg transition duration-200
            {{ request()->routeIs('userDashboard') ? 'bg-secondary-light text-white' : 'text-gray-300 hover:bg-secondary-light hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('userDashboard') ? 'text-primary' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3">Dashboard</span>
            </a>

            <!-- Book Court -->
            <a href="{{ route('bookcourt', auth()->user()->id) }}"
            class="flex items-center px-4 py-3 rounded-lg transition duration-200
            {{ request()->routeIs('bookcourt') ? 'bg-secondary-light text-white' : 'text-gray-300 hover:bg-secondary-light hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('bookcourt') ? 'text-primary' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="ml-3">Book Court</span>
            </a>

            <!-- My Bookings -->
            <a href="{{ route('mybookings', auth()->user()->id) }}"
            class="flex items-center px-4 py-3 rounded-lg transition duration-200
            {{ request()->routeIs('mybookings') ? 'bg-secondary-light text-white' : 'text-gray-300 hover:bg-secondary-light hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('mybookings') ? 'text-primary' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="ml-3">My Bookings</span>
            </a>

            <!-- Profile -->
            <a href="{{ route('profile', auth()->user()->id) }}"
            class="flex items-center px-4 py-3 rounded-lg transition duration-200
            {{ request()->routeIs('profile') ? 'bg-secondary-light text-white' : 'text-gray-300 hover:bg-secondary-light hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('profile') ? 'text-primary' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="ml-3">Profile</span>
            </a>
        </nav>
    </div>

    <!-- Logout -->
    <div class="mt-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200 ml-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-2">Logout</span>
            </button>
        </form>
    </div>
</div>

            </div>
        </div>

        <!-- Mobile Header & Nav -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-4 py-3 bg-secondary-light border-b md:hidden">
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="text-gray-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="ml-4 flex items-center">
                        <div class="flex items-center">
                            <img src="{{ asset('logos/futsalmate_logo.png') }}" alt="Futsal Mate Logo" class="h-12 w-auto max-w-[120px] object-contain">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="flex items-center text-gray-500 focus:outline-none">
                        <div class="w-full max-w-sm text-center">
                            <img src="{{ Auth::user()->profile_photo_url ? asset(Auth::user()->profile_photo_url) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                            alt="Profile Picture"
                            class="h-12 w-12 rounded-full object-cover shadow-lg mx-auto" />
                    </button>
                </div>
            </header>

            <!-- Mobile Sidebar -->
            <div id="mobile-sidebar" class="fixed inset-0 z-40 hidden md:hidden">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
                <div class="relative flex-1 flex flex-col max-w-xs w-full bg-secondary">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button id="close-sidebar" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <img src="{{ asset('logos/futsalmate_logo.png') }}" alt="Futsal Mate Logo" class="h-12 w-auto max-w-[120px] object-contain">
                                </div>
                            </div>
                        </div>
                        <nav class="mt-5 px-2 space-y-1">
                            <a href="{{route('userDashboard', auth()->user()->id)}}" class="flex items-center px-4 py-3 text-white bg-secondary-light rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                            <a href="{{route('bookcourt', auth()->user()->id)}}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">Book Court</span>
                            </a>
                            <a href="{{route('mybookings', auth()->user()->id)}}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span class="ml-3">My Bookings</span>
                            </a>
                            <a href="{{route('profile', auth()->user()->id)}}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="ml-3">Profile</span>
                            </a>
                            
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>Logout
                                </button>
                            </form>
                            
                        </nav>
                    </div>
                </div>
                <div class="flex-shrink-0 w-14"></div>
            </div>