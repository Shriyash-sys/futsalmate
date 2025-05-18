@extends('admin.layouts.master')

@section('conduct')

<!-- Main Container -->
<div class="min-h-screen w-full bg-gradient-to-br from-gray-950 via-gray-900 to-black flex flex-col items-center justify-start pt-12 px-4 sm:px-6 text-white font-sans">

    <!-- Card -->
    <div class="w-full max-w-6xl bg-gray-900 rounded-2xl shadow-2xl overflow-hidden">

        <!-- Profile Photo + Upload -->
        <div class="flex flex-col sm:flex-row items-center sm:items-end gap-6 px-10 pt-10 pb-4">
            <div class="relative">
                <img src="{{ Auth::user()->profile_photo_url ? asset(Auth::user()->profile_photo_url) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                    alt="Profile Picture"
                    class="w-32 h-32 rounded-full object-cover ring-4 ring-green-400 shadow-xl transition-all duration-300 hover:scale-105" />
            </div>

            <div class="flex flex-col gap-2">
                <form method="POST" action="{{ route('admin.addAdminProfilePhoto') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="profile_photo" class="cursor-pointer inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow transition duration-300">
                        Change Picture
                    </label>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="hidden" onchange="this.form.submit()" />
                </form>

                @if(Auth::user()->profile_photo_url)
                    <form method="POST" action="{{ route('admin.deleteAdminProfilePhoto') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500 hover:underline transition">Remove Picture</button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Profile Header -->
        <div class="px-10 pb-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h2 class="text-4xl font-bold text-white">{{ $admin->full_name }}</h2>
                    <p class="text-gray-400">{{ $admin->email }}</p>
                    <p class="text-sm text-gray-500 mt-1">Role: <span class="text-green-400 font-semibold">Super Admin</span></p>
                </div>
                <div class="mt-6 md:mt-0 flex gap-4">
                    <button class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded shadow text-sm">Edit Profile</button>
                    <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded shadow text-sm">Change Password</button>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-10 pb-6 text-center">
            <div class="bg-gray-800 p-6 rounded-xl shadow hover:bg-gray-700 transition">
                <div class="text-3xl font-bold">{{ $bookings }}</div>
                <div class="text-gray-400 mt-1">Bookings</div>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl shadow hover:bg-gray-700 transition">
                <div class="text-3xl font-bold">{{ $courts }}</div>
                <div class="text-gray-400 mt-1">Courts</div>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl shadow hover:bg-gray-700 transition">
                <div class="text-3xl font-bold">{{ $registeredUserCount }}</div>
                <div class="text-gray-400 mt-1">Registered Users</div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 px-10 pb-10">
            <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-md transition">
                <p class="text-sm text-gray-500 mb-1">Joined</p>
                <p class="text-white font-medium">{{ $joinedDate }}</p>
            </div>
            <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-md transition">
                <p class="text-sm text-gray-500 mb-1">Status</p>
                <p class="text-green-400 font-semibold">Active</p>
            </div>
        </div>

    </div>
</div>

@endsection
