@extends('admin.layouts.master')

@section('conduct')

<!-- Main Content -->
<div class="min-h-screen w-full bg-gray-950 flex flex-col items-center pt-12 mt-16 lg:mt-0 px-4 sm:px-6 lg:px-8">

    <!-- Users Section -->
    <div class="w-full max-w-7xl bg-gray-900 rounded-xl shadow-lg px-4 sm:px-6 py-5 overflow-hidden">
        <div class="p-4 sm:p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-gray-800">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">Users</h2>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-white">
                <thead class="bg-gray-800 text-gray-400 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Profile</th>
                        <th class="px-4 py-3 text-left">Full Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Joined Date</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-800 transition duration-200">
                            <td class="px-4 py-3">
                                <img src="{{ $user->profile_photo_url ?? 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                    class="w-10 h-10 rounded-full object-cover border-2 border-green-500 shadow"
                                    alt="User Image">
                            </td>
                            <td class="px-4 py-3 font-medium">{{ $user->full_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-gray-300">{{ $user->email ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-gray-300">{{ $user->phone ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-gray-400">{{ $user->created_at?->format('d M Y') ?? 'N/A' }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <form action="{{route('admin.deleteUser', ['id' => $user->id])}}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-medium shadow">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-400">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection