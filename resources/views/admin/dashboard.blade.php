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
          <p class="text-2xl font-bold mt-2">Rs. {{number_format($totalRevenue, 2)}}</p>
        </div>
        <div class="bg-gray-900 rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-400">Available Courts</h2>
          <p class="text-2xl font-bold mt-2">{{$courts}}</p>
        </div>
        <div class="bg-gray-900 rounded-xl shadow p-4">
          <h2 class="text-sm text-gray-400">Registered Users</h2>
          <p class="text-2xl font-bold mt-2">{{$registeredUserCount}}</p>
        </div>
      </section>

      <!-- My Courts -->
<section id="courts" class="bg-gray-900 rounded-xl shadow p-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold text-white">My Courts</h2>
    <a href="{{ route('admin.addcourtForm') }}"
      class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded">
      + Add Court
    </a>
  </div>

  <div class="overflow-x-auto">
    <ul class="min-w-full divide-y divide-gray-800 text-white">
      @forelse ($courtName as $court)
        <li class="py-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div class="flex-1 font-medium">{{ $court->court_name ?? 'Unnamed Court' }}</div>
          <div class="flex-1 text-sm text-gray-300">{{ $court->location ?? 'N/A' }}</div>
          <div class="text-sm text-gray-400">{{ $court->price ?? 'N/A' }}/hr</div>
        </li>
      @empty
        <li class="py-6 text-center text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 mb-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4h10z" />
          </svg>
          <p>No courts found. Click "+ Add Court" to get started.</p>
        </li>
      @endforelse
    </ul>
  </div>

  <!-- View All Button -->
  <div class="mt-6 text-right">
        <a href="{{ route('admin.mycourts') }}"
          class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-md shadow transition duration-300">
          View All
        </a>
      </div>
</section>


      <!-- Bookings -->
    <section id="bookings" class="bg-gray-900 rounded-xl shadow p-6">
      <h2 class="text-lg font-semibold mb-4 text-white">Recent Bookings</h2>
      <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-white">
      <thead class="bg-gray-800 text-gray-400 uppercase text-xs">
        <tr>
          <th class="p-2 text-left">User</th>
          <th class="p-2 text-left">Court</th>
          <th class="p-2 text-left">Date</th>
          <th class="p-2 text-left">Time</th>
          <th class="p-2 text-left">Amount</th>
          <th class="p-2 text-left">Payment Method</th>
          <th class="p-2 text-left">Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($userName as $user)
          <tr class="border-t border-gray-800">
            <td class="p-2">{{ $user->user?->full_name ?? 'N/A' }}</td>
            <td class="p-2">{{ $user->court->court_name ?? 'N/A' }}</td>
            <td class="p-2">{{ $user->date ?? 'N/A' }}</td>
            <td class="p-2">{{ $user->time ?? 'N/A' }}</td>
            <td class="p-2">{{ $user->price ?? 'N/A' }}</td>
            <td class="p-2">{{ $user->payment ?? 'N/A' }}</td>
            <td class="p-2 text-green-400 font-medium">Confirmed</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="p-6 text-center text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 mb-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
              </svg>
              No bookings have been made yet.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

    <!-- View All Button -->
      <div class="mt-6 text-right">
        <a href="{{ route('admin.bookings') }}"
          class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-md shadow transition duration-300">
          View All
        </a>
      </div>
    </section>


      <!-- Users -->
<section id="users" class="bg-gray-900 rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4 text-white">User Management</h2>
    <ul class="divide-y divide-gray-800">
        @forelse ($userManagement as $user)
        <li class="py-2 flex justify-between items-center">
            <div>
                <p class="font-medium text-white">{{$user->full_name}}</p>
                <p class="text-sm text-gray-400">{{$user->email}}</p>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Remove</button>
        </li>
        @empty
        <li class="py-6 text-center text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 mb-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c0 2.21-1.79 4-4 4S4 13.21 4 11s1.79-4 4-4 4 1.79 4 4zm8 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4z" />
            </svg>
            No users registered yet.
        </li>
        @endforelse
    </ul>

    {{-- View All Button --}}
    <div class="mt-6 text-right">
        <a href="{{ route('admin.users') }}"
          class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-md shadow transition duration-300">
          View All
        </a>
      </div>
</section>


</div>

@endsection
