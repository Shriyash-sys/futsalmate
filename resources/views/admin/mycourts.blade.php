@extends('admin.layouts.master')

@section('conduct')

    <!-- Main Content -->
    <div class="h-full w-full bg-gray-950 flex flex-col items-center pt-12 px-6">

        <!-- My Courts Section -->
        <div class="w-full max-w-6xl bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
        
        <!-- Header with Title -->
        <div class="p-6 flex justify-between items-center">
            <h2 class="text-3xl font-bold">My Courts</h2>
            <a href="{{route('admin.addcourtForm')}}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">+ Add New Court</a>
        </div>

        <!-- Court List -->

        
            
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
            <thead>
                <tr>
                <th class="py-3 px-4 text-left text-gray-300">Court Name</th>
                <th class="py-3 px-4 text-left text-gray-300">Location</th>
                <th class="py-3 px-4 text-left text-gray-300">Price</th>
                <th class="py-3 px-4 text-center text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courts as $court)
                <tr class="border-t border-gray-800">
                <td class="py-3 px-4">{{$court->court_name}}</td>
                <td class="py-3 px-4">{{$court->location}}</td>
                <td class="py-3 px-4 text-green-500">1200</td>
                <td class="py-3 px-4 text-center">
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">Edit</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded ml-2">Delete</button>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection