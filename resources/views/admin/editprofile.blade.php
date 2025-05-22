@extends('admin.layouts.master')

@section('conduct')
<div class="min-h-screen bg-gray-950 py-10 px-4 sm:px-6 mt-16 lg:mt-0 md:px-8">
    <div class="max-w-3xl mx-auto bg-gray-800 text-white rounded-2xl shadow-lg p-6 sm:p-8 md:p-10 overflow-hidden">

        <!-- Header Section -->
        <div class="p-6 sm:p-8 border-b border-gray-700">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h2 class="text-2xl font-bold text-white">Edit Profile</h2>
            </div>
        </div>

        <!-- Form Section -->
        <div class="p-6 sm:p-8">
            <form method="POST" action="{{route('admin.editProfile', $admin->id)}}">
                @csrf
                @method('PUT')

                <!-- Account Details -->
                <div class="mb-8 pb-6 border-b border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Account Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-white mb-1">Role</label>
                            <div class="px-3 py-2 bg-gray-700 rounded-md text-white">Admin</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-white mb-1">Status</label>
                            <div class="px-3 py-1 inline-flex items-center rounded-full bg-green-600 text-white text-sm font-medium">
                                Active
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-white mb-1">Joined Date</label>
                            <div class="px-3 py-2 bg-gray-700 rounded-md text-white">May 21, 2025</div>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="mb-8 pb-6 border-b border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Personal Information</h3>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="full-name" class="block text-sm font-medium text-white mb-1">Full Name</label>
                            <input type="text" id="full-name" name="full_name" value="{{ old('full_name', $admin->full_name) }}"
                                class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}"
                                class="w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-white mb-4">Change Password</h3>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-white mb-1">Current Password</label>
                            <input type="password" id="current_password" name="current_password"
                                class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-white mb-1">New Password</label>
                            <input type="password" id="new_password" name="new_password"
                                class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-white mb-1">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-4">
                    <a href="{{ route('admin.profile') }}"
                        class="px-4 py-2 border border-gray-600 rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
