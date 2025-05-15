@extends('admin.layouts.master')

@section('conduct')

    <!-- Main Content -->
    <div class="flex-1 p-6 space-y-8">

    <!-- Header -->
    <header class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Dashboard</h2>
        <div class="text-sm text-gray-400">Welcome, {{$admin->full_name}}</div>
    </header>

      <!-- Summary Cards -->
      <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-gray-900 rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-400">Total Bookings</h2>
          <p class="text-2xl font-bold mt-2">{{$bookings}}</p>
        </div>
        <div class="bg-gray-900 rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-400">Total Revenue</h2>
          <p class="text-2xl font-bold mt-2">€18,300</p>
        </div>
        <div class="bg-gray-900 rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-400">Available Courts</h2>
          <p class="text-2xl font-bold mt-2">{{$courts}}</p>
        </div>
        <div class="bg-gray-900 rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-400">Registered Users</h2>
          <p class="text-2xl font-bold mt-2">720</p>
        </div>
      </section>

      <!-- My Courts -->
      <section id="courts" class="bg-gray-900 rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-lg font-semibold">My Courts</h2>
          <button class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded">+ Add Court</button>
        </div>
        <ul class="divide-y divide-gray-800">
          <li class="py-3 flex justify-between items-center">
            <span>Court 1 - Indoor Turf</span>
            <span class="text-sm text-gray-400">Capacity: 10</span>
          </li>
          <li class="py-3 flex justify-between items-center">
            <span>Court 2 - Outdoor Grass</span>
            <span class="text-sm text-gray-400">Capacity: 12</span>
          </li>
          <li class="py-3 flex justify-between items-center">
            <span>Court 3 - Synthetic</span>
            <span class="text-sm text-gray-400">Capacity: 8</span>
          </li>
        </ul>
      </section>

      <!-- Bookings -->
      <section id="bookings" class="bg-gray-900 rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Recent Bookings</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-white">
            <thead class="bg-gray-800 text-gray-400 uppercase text-xs">
              <tr>
                <th class="p-2 text-left">User</th>
                <th class="p-2 text-left">Court</th>
                <th class="p-2 text-left">Date</th>
                <th class="p-2 text-left">Time</th>
                <th class="p-2 text-left">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t border-gray-800">
                <td class="p-2">John Doe</td>
                <td class="p-2">Court 1</td>
                <td class="p-2">2025-05-15</td>
                <td class="p-2">18:00 - 19:00</td>
                <td class="p-2 text-green-400 font-medium">Confirmed</td>
              </tr>
              <tr class="border-t border-gray-800">
                <td class="p-2">Maria López</td>
                <td class="p-2">Court 3</td>
                <td class="p-2">2025-05-16</td>
                <td class="p-2">20:00 - 21:00</td>
                <td class="p-2 text-yellow-300 font-medium">Pending</td>
              </tr>
              <tr class="border-t border-gray-800">
                <td class="p-2">Ali Khan</td>
                <td class="p-2">Court 2</td>
                <td class="p-2">2025-05-16</td>
                <td class="p-2">19:00 - 20:00</td>
                <td class="p-2 text-red-400 font-medium">Cancelled</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Users -->
      <section id="users" class="bg-gray-900 rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">User Management</h2>
        <ul class="divide-y divide-gray-800">
          <li class="py-2 flex justify-between items-center">
            <div>
              <p class="font-medium">John Doe</p>
              <p class="text-sm text-gray-400">john@example.com</p>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Block</button>
          </li>
          <li class="py-2 flex justify-between items-center">
            <div>
              <p class="font-medium">Sarah Lee</p>
              <p class="text-sm text-gray-400">sarah@example.com</p>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Block</button>
        </li>
        </ul>
    </section>

</div>

@endsection
