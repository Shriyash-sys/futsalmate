@extends('admin.layouts.master')

@section('conduct')

<!-- Main Content -->
    <div class="h-full w-full bg-gray-950 flex flex-col items-center pt-12 px-6">

        <!-- Bookings Section -->
        <div class="w-full max-w-6xl bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
        
        <!-- Header -->
        <div class="p-6 flex justify-between items-center">
            <h2 class="text-3xl font-bold">Bookings</h2>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">+ New Booking</button>
        </div>

        <!-- Bookings Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
            <thead>
                <tr>
                <th class="py-3 px-4 text-left text-gray-300">User</th>
                <th class="py-3 px-4 text-left text-gray-300">Court</th>
                <th class="py-3 px-4 text-left text-gray-300">Date</th>
                <th class="py-3 px-4 text-left text-gray-300">Time</th>
                <th class="py-3 px-4 text-left text-gray-300">Status</th>
                <th class="py-3 px-4 text-center text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t border-gray-800">
                <td class="py-3 px-4">John Doe</td>
                <td class="py-3 px-4">Court A</td>
                <td class="py-3 px-4">2025-05-15</td>
                <td class="py-3 px-4">17:00 - 18:00</td>
                <td class="py-3 px-4 text-green-500">Confirmed</td>
                <td class="py-3 px-4 text-center">
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded">Edit</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">Cancel</button>
                    <button class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded ml-2">View</button>
                </td>
                </tr>
                <tr class="border-t border-gray-800">
                <td class="py-3 px-4">Emily Clark</td>
                <td class="py-3 px-4">Court B</td>
                <td class="py-3 px-4">2025-05-16</td>
                <td class="py-3 px-4">19:00 - 20:00</td>
                <td class="py-3 px-4 text-yellow-400">Pending</td>
                <td class="py-3 px-4 text-center">
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded">Edit</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">Cancel</button>
                    <button class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded ml-2">View</button>
                </td>
                </tr>
                <tr class="border-t border-gray-800">
                <td class="py-3 px-4">Carlos Perez</td>
                <td class="py-3 px-4">Court C</td>
                <td class="py-3 px-4">2025-05-17</td>
                <td class="py-3 px-4">16:00 - 17:00</td>
                <td class="py-3 px-4 text-red-500">Cancelled</td>
                <td class="py-3 px-4 text-center">
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded">Edit</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">Cancel</button>
                    <button class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded ml-2">View</button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>

        </div>

    </div>

@endsection