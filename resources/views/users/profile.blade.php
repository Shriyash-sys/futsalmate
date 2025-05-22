@extends('users.layouts.master')

@section('context')

<div class="min-h-screen flex flex-col md:flex-row bg-gray-100">

    <!-- Left Panel -->
    <div class="md:w-1/3 w-full bg-green-100 flex justify-center items-center p-10">
        <div class="w-full max-w-sm text-center">
            <img src="{{ Auth::user()->profile_photo_url ? asset(Auth::user()->profile_photo_url) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                alt="Profile Picture"
                class="w-32 h-32 rounded-full object-cover ring-4 ring-green-400 shadow-lg mx-auto mb-6" />

            <h2 class="text-xl font-bold text-green-900">{{ Auth::user()->full_name }}</h2>
            <p class="text-sm text-green-700">{{ Auth::user()->email }}</p>
            <p class="text-sm text-green-700">{{ Auth::user()->phone }}</p>

            <!-- Upload New Profile Photo -->
            <form method="POST" action="{{ route('addProfilePhoto') }}" enctype="multipart/form-data" class="mt-6">
                @csrf
                <label for="profile_photo" class="cursor-pointer inline-block bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
                    Change Picture
                </label>
                <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="hidden" onchange="this.form.submit()" />
            </form>

            <!-- Remove Photo -->
            @if(Auth::user()->profile_photo_url)
                <form method="POST" action="{{ route('deleteProfilePhoto') }}" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-500 hover:underline">Remove Picture</button>
                </form>
            @endif
        </div>
    </div>

    <!-- Right Panel -->
    <div class="md:w-2/3 w-full bg-white p-10 overflow-y-auto">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold text-green-700 mb-8">Edit Your Profile</h1>

            <form action="{{ route('editProfile', Auth::user()->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name', Auth::user()->full_name) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-400 transition">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-400 transition">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-400 transition">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-6 gap-4">
                    <a href="#" class="px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition shadow">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection


