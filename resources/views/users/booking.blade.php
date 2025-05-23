@extends('users.layouts.master')

@section('context')
    <div class="flex h-screen overflow-hidden">

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-100">
            <div class="py-6">
                <div class="px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Book a Court</h1>
                </div>
                <div class="px-4 sm:px-6 md:px-8">
                    <form action="{{ route('bookings') }}" method="POST" class="mt-6">
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf

                        <!-- Step 1: Select Court -->
    <div class="bg-white shadow overflow-hidden sm:rounded-md mb-6">
        <div class="px-4 py-5 sm:px-6 bg-secondary text-white">
            <h3 class="text-lg leading-6 font-medium">Step 1: Select Court</h3>
            <p class="mt-1 max-w-2xl text-sm">Choose your preferred court</p>
        </div>
    
        @forelse ($courts as $court)
        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-4">
                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <input id="court{{$court->id}}" name="court_id" type="radio"
                            class="focus:ring-primary h-4 w-4 text-primary border-gray-300"
                            value="{{$court->id}}" required>
                    </div>
                        <div class="ml-3 flex justify-between w-full">
                            <div>
                                <label for="court{{$court->id}}" class="font-medium text-gray-700">{{$court->court_name}}</label>
                                <p class="text-gray-500">{{$court->location}}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-primary font-bold">{{$court->price}}/hr</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Improved Empty State -->
            <div class="px-6 py-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-700">No Courts Available</h3>
                <p class="mt-2 text-gray-500">We couldn't find any courts right now.</p>
            </div>
        @endforelse
    </div>
                        <!-- Step 2: Select Date and Time -->
                        <div class="bg-white shadow overflow-hidden sm:rounded-md mb-6">
                            <div class="px-4 py-5 sm:px-6 bg-secondary text-white">
                                <h3 class="text-lg leading-6 font-medium">Step 2: Select Date and Time</h3>
                                <p class="mt-1 max-w-2xl text-sm">Choose when you want to play</p>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <div>
                                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                        <input type="date" name="date" id="date"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                            min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                            required>
                                    </div>
                                    <div>
                                        <label for="time" class="block text-sm font-medium text-gray-700">Time
                                            Slot</label>
                                        <select id="time" name="time"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                            required>
                                            <option value="">Select a time slot</option>
                                            <option value="6:00 AM - 7:00 AM">6:00 AM - 7:00 AM</option>
                                            <option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
                                            <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                                            <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                                            <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                            <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                            <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                                            <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                                            <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                                            <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                                            <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                                            <option value="5:00 PM - 6:00 PM">5:00 PM - 6:00 PM</option>
                                            <option value="6:00 PM - 7:00 PM">6:00 PM - 7:00 PM</option>
                                            <option value="7:00 PM - 8:00 PM">7:00 PM - 8:00 PM</option>
                                            <option value="8:00 PM - 9:00 PM">8:00 PM - 9:00 PM</option>
                                            <option value="9:00 PM - 10:00 PM">9:00 PM - 10:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 3: Payment Method -->
                        <div class="bg-white shadow overflow-hidden sm:rounded-md mb-6">
                            <div class="px-4 py-5 sm:px-6 bg-secondary text-white">
                                <h3 class="text-lg leading-6 font-medium">Step 3: Payment Method</h3>
                                <p class="mt-1 max-w-2xl text-sm">Choose how you want to pay</p>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">
                                    <!-- Changed to 3 cols since you have 3 items -->
                                    <!-- eSewa -->
                                    <div class="relative">
                                        <input type="radio" id="esewa" name="payment" value="esewa"
                                            class="sr-only peer" required>
                                        <label for="esewa"
                                            class="flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:border-primary peer-checked:bg-primary-light h-full">
                                            <div class="flex items-center justify-center h-12 w-full">
                                                <!-- Fixed height container -->
                                                <img src="{{ asset('logos/esewa_logo.jpg') }}" alt="eSewa"
                                                    class="h-full w-auto object-contain max-h-full max-w-full">
                                            </div>
                                            <span class="mt-2 font-medium">eSewa</span>
                                        </label>
                                    </div>

                                    <!-- Hand Cash -->
                                    <div class="relative">
                                        <input type="radio" id="cash" name="payment" value="cash"
                                            class="sr-only peer">
                                        <label for="cash"
                                            class="flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:border-primary peer-checked:bg-primary-light h-full">
                                            <div class="flex items-center justify-center h-12 w-full">
                                                <img src="{{ asset('logos/cash_logo.jpg') }}" alt="Hand Cash"
                                                    class="h-full w-auto object-contain max-h-full max-w-full">
                                            </div>
                                            <span class="mt-2 font-medium">Hand Cash</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-secondary bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    </div>

@endsection
