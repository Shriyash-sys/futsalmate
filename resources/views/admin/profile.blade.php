@extends('admin.layouts.master')

@section('conduct')

    <!-- Main Content -->
    <div class="h-full w-full bg-gray-950 flex flex-col items-center justify-start pt-12 px-6">

        <!-- Profile Card Full Width -->
        <div class="w-full max-w-6xl bg-gray-900 rounded-2xl shadow-xl overflow-hidden">

        <!-- Header with cover -->
        <div class="relative h-48 bg-gradient-to-r from-gray-800 to-gray-700">
            <div class="absolute -bottom-12 left-10">
            <img src="https://i.pravatar.cc/100?img=12" alt="Admin" class="w-24 h-24 rounded-full border-4 border-black shadow-xl" />
            </div>
        </div>

        <!-- Body -->
        <div class="p-10 pt-20">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-3xl font-bold">{{$admin->full_name}}</h2>
                <p class="text-gray-400">{{$admin->email}}</p>
                <p class="text-sm text-gray-500 mt-1">Role: Super Admin</p>
            </div>
            <div class="mt-6 md:mt-0 flex space-x-4">
                <button class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded">Edit Profile</button>
                <button class="bg-gray-700 hover:bg-red-600 text-white px-4 py-2 rounded">Change Password</button>
            </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 text-center mt-10 border border-gray-800 rounded-lg overflow-hidden">
            <div class="p-6">
                <p class="text-2xl font-bold">1,240</p>
                <p class="text-gray-400 text-sm">Bookings</p>
            </div>
            <div class="border-t sm:border-t-0 sm:border-l sm:border-r border-gray-800 p-6">
                <p class="text-2xl font-bold">6</p>
                <p class="text-gray-400 text-sm">Courts</p>
            </div>
            <div class="p-6">
                <p class="text-2xl font-bold">720</p>
                <p class="text-gray-400 text-sm">Users</p>
            </div>
            </div>

            <!-- More Info -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10 text-gray-300">
            <div>
                <p class="text-sm text-gray-500">Joined</p>
                <p class="text-white">March 15, 2024</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Status</p>
                <p class="text-green-500 font-semibold">Active</p>
            </div>
            </div>
        </div>
        </div>

    </div>

@endsection
