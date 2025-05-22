@extends('users.layouts.master')

@section('context')
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-2xl shadow-md p-10">
        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900">Edit Booking</h1>
            <p class="mt-2 text-lg text-gray-600">Modify your booking details below</p>
        </div>

        {{-- Court Info --}}
        <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 mb-8 flex items-center gap-5">
            <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold shadow">
                {{ strtoupper(substr($editForm->court->court_name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{ $editForm->court->court_name }}</h2>
                <p class="text-sm text-gray-500">{{ $editForm->court->location ?? 'No location info' }}</p>
            </div>
        </div>

        {{-- Booking Edit Form --}}
        <form action="{{ route('editBooking', $editForm->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Date --}}
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                    <input type="date" name="date" id="date"
                        value="{{ old('date', $editForm->date) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                {{-- Time Slot --}}
                <div>
                    <label for="time" class="block text-sm font-medium text-gray-700 mb-2">Time Slot</label>
                    <select id="time" name="time"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none"
                        required>
                        <option value="">Select a time slot</option>
                        @foreach([
                            '6:00 AM - 7:00 AM',
                            '7:00 AM - 8:00 AM',
                            '8:00 AM - 9:00 AM',
                            '9:00 AM - 10:00 AM',
                            '10:00 AM - 11:00 AM',
                            '11:00 AM - 12:00 PM',
                            '12:00 PM - 1:00 PM',
                            '1:00 PM - 2:00 PM',
                            '2:00 PM - 3:00 PM',
                            '3:00 PM - 4:00 PM',
                            '4:00 PM - 5:00 PM',
                            '5:00 PM - 6:00 PM',
                            '6:00 PM - 7:00 PM',
                            '7:00 PM - 8:00 PM',
                            '8:00 PM - 9:00 PM',
                            '9:00 PM - 10:00 PM'
                        ] as $slot)
                            <option value="{{ $slot }}" {{ old('time', $editForm->time) == $slot ? 'selected' : '' }}>
                                {{ $slot }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex justify-center gap-6 pt-8">
                <a href="{{ route('mybookings') }}"
                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl text-base font-medium transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl text-base font-medium transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>



<script>
        // Mobile menu toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        sidebarToggle.addEventListener('click', () => {
            mobileSidebar.classList.toggle('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            mobileSidebar.classList.add('hidden');
        });
    </script>
@endsection
