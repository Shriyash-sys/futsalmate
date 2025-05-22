<!-- Mobile Header -->
<header
    class="fixed top-0 left-0 right-0 z-50 bg-gray-900 text-white md:hidden flex justify-between items-center p-4 shadow">
    <div class="flex items-center space-x-3">
        <button class="text-white focus:outline-none" id="mobileMenuToggle">
            <!-- Hamburger icon -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <img class="h-10 w-auto object-contain" src="{{ asset('logos/futsalmate_logo.png') }}" alt="futsalmatelogo">
    </div>

    <!-- Profile Photo -->
    <div class="flex items-center space-x-2">
        <img class="w-12 h-12 rounded-full object-cover shadow-xl transition-all duration-300 hover:scale-105"
            src="{{ Auth::user()->profile_photo_url ? asset(Auth::user()->profile_photo_url) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
            alt="Profile Picture" />
    </div>
</header>

<!-- Mobile Sidebar (Dropdown) -->
<aside
    class="fixed top-0 inset-x-0 bg-gray-900 transform -translate-y-full transition-transform duration-300 z-50 md:hidden"
    id="mobileSidebar">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-xl font-bold text-white">Menu</h4>
            <button class="text-white" id="closeMobileMenu">
                <!-- Close icon -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="space-y-2">
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white"
                href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white" href="{{ route('admin.mycourts') }}">My
                Courts</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white"
                href="{{ route('admin.bookings') }}">Bookings</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white" href="{{ route('admin.users') }}">Users</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white"
                href="{{ route('admin.profile') }}">Profile</a>
            <form action="{{ route('admin.logouts') }}" method="POST">
                @csrf
                <button class="block w-full text-left py-2 px-3 text-red-500 hover:bg-gray-800 rounded" type="submit">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</aside>

<!-- Desktop Sidebar -->
<aside class="w-64 bg-gray-900 hidden md:block">
    <div class="p-6">
        <h4 class="text-xl font-bold mb-6">
            <img class="h-12 w-auto max-w-[120px] object-contain" src="{{ asset('logos/futsalmate_logo.png') }}"
                alt="futsalmatelogo">
        </h4>
        <nav class="space-y-2">
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white"
                href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white" href="{{ route('admin.mycourts') }}">My
                Courts</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white"
                href="{{ route('admin.bookings') }}">Bookings</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white" href="{{ route('admin.users') }}">Users</a>
            <a class="block py-2 px-3 rounded hover:bg-gray-800 text-white"
                href="{{ route('admin.profile') }}">Profile</a>
            <form action="{{ route('admin.logouts') }}" method="POST">
                @csrf
                <button class="block w-full text-left py-2 px-3 text-red-500 hover:bg-gray-800 rounded" type="submit">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</aside>

<script>
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeMobileMenu = document.getElementById('closeMobileMenu');

    mobileMenuToggle.addEventListener('click', () => {
        mobileSidebar.classList.remove('-translate-y-full');
    });

    closeMobileMenu.addEventListener('click', () => {
        mobileSidebar.classList.add('-translate-y-full');
    });
</script>
