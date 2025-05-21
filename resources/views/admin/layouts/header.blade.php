<!-- Sidebar -->

<aside class="w-64 bg-gray-900 hidden md:block">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">🏆 Admin Panel</h1>
        <nav class="space-y-2">
        <a href="{{route('admin.dashboard')}}" class="block py-2 px-3 rounded hover:bg-gray-800">Dashboard</a>
        <a href="{{route('admin.mycourts')}}" class="block py-2 px-3 rounded hover:bg-gray-800">My Courts</a>
        <a href="{{route('admin.bookings')}}" class="block py-2 px-3 rounded hover:bg-gray-800">Bookings</a>
        <a href="{{route('admin.users')}}" class="block py-2 px-3 rounded hover:bg-gray-800">Users</a>
        <a href="{{route('admin.profile')}}" class="block py-2 px-3 rounded hover:bg-gray-800">Profile</a>
        <form action="{{ route('admin.logouts') }}" method="POST">
        @csrf
            <button type="submit" class="block w-full text-left py-2 px-3 text-red-500 hover:bg-gray-800 rounded">
            Logout
            </button>
        </form>
        </nav>
    </div>
</aside>

