@extends('users.layouts.master')

@section('context')
<div class="flex h-screen overflow-hidden">
    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto bg-gray-100">
        <div class="py-6">
            <div class="px-4 sm:px-6 md:px-8">
                <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
            </div>
            <div class="px-4 sm:px-6 md:px-8">
                <!-- Welcome Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
                    <div class="p-6 bg-gradient-to-r from-secondary to-secondary-light text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold">Welcome back, {{$user->full_name}}!</h2>
                                <p class="mt-1">Ready to book your next futsal session?</p>
                            </div>
                            <div class="hidden sm:block">
                                <a href="{{route('bookcourt', auth()->user()->id)}}" class="inline-block bg-primary hover:bg-primary-dark text-secondary font-bold py-2 px-4 rounded-lg transition duration-300">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards - Fixed Layout -->
                <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Total Bookings Card - Fixed -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6 h-full flex flex-col">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-primary rounded-md p-3">
                                    <svg class="h-6 w-6 text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Bookings</dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">{{ $totalBookings }}</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="mt-auto bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{route('mybookings', auth()->user()->id)}}" class="font-medium text-primary hover:text-primary-dark">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Upcoming Bookings -->
                <div class="mt-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Upcoming Bookings</h2>
                        <a href="{{route('mybookings')}}" class="text-sm font-medium text-primary hover:text-primary-dark">View all →</a>
                    </div>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <ul class="divide-y divide-gray-200">
                        <!-- Bookings -->
                        @forelse ($upcomingBookings as $upcomingBooking)
                            <li class="hover:bg-gray-50 transition-colors duration-150">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                    <div class="flex items-center mb-3 sm:mb-0">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary flex items-center justify-center">
                                            <span class="text-secondary font-bold">{{ strtoupper(substr($upcomingBooking->court->court_name, 0, 1)) }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{$upcomingBooking->court->court_name}}</div>
                                            <div class="text-sm text-gray-500">{{$upcomingBooking->id}}</div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:items-end">
                                        <div class="text-sm font-medium text-gray-900">
                                            <p class="text-sm text-gray-600">{{ $upcomingBooking->date }}</p>
                                            <p class="text-sm font-semibold text-gray-800">{{ $upcomingBooking->time }}</p>
                                        </div>
                                        <div class="mt-1 sm:mt-0">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Confirmed
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                            {{$upcomingBooking->court->location}}
                                    </div>
                                    <div class="mt-2 sm:mt-0 flex space-x-2">
                                        <button class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none">
                                            View
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                    </ul>
                            <div class="px-6 py-12 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-gray-700">No Upcoming Bookings</h3>
                                <p class="mt-2 text-gray-500">You don't have any upcoming bookings.</p>
                            </div>
                            @endforelse
                    </div>
                </div>

@endsection