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
        @foreach ($courtName as $court)   
        
        <ul class="divide-y divide-gray-800">
          <li class="py-3 flex justify-between items-center">
            <span>{{$court->court_name}}</span>
            <span class="text-sm text-gray-400">{{$court->price}}/hr</span>
          </li>
          
        </ul>

        @endforeach
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
            @foreach ($userName as $user )
            <tbody>
              <tr class="border-t border-gray-800">
                  <td class="p-2">{{$user->full_name}}</td>
                <td class="p-2">{{$user->courts->court_name}}</td>
                <td class="p-2">{{$user->date}}</td>
                <td class="p-2">{{$user->time}}</td>
                <td class="p-2 text-green-400 font-medium">Confirmed</td>
              </tr>
            </tbody>
            @endforeach
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
