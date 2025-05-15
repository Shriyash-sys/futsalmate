<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Futsal Mate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#77f07b',
                        secondary: '#0e1211',
                        'primary-dark': '#5ad35e',
                        'primary-light': '#a4f7a7',
                        'secondary-light': '#1a2422',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-secondary">
                <div class="flex items-center justify-center h-16 px-4 bg-secondary-light">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 text-white font-bold text-lg">Futsal Mate</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-6 overflow-y-auto">
                    <div class="flex flex-col flex-grow">
                        <nav class="flex-1 space-y-2">
                            <a href="user-dashboard.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                            <a href="booking.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">Book Court</span>
                            </a>
                            <a href="my-bookings.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span class="ml-3">My Bookings</span>
                            </a>
                            <a href="profile.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="ml-3">Profile</span>
                            </a>
                        </nav>
                    </div>
                    <div class="mt-6">
                        <a href="index.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="ml-3">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Header & Nav -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-4 py-3 bg-white border-b md:hidden">
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="text-gray-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="ml-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 font-bold text-lg">Futsal Mate</span>
                    </div>
                </div>
                <div>
                    <button class="flex items-center text-gray-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Mobile Sidebar -->
            <div id="mobile-sidebar" class="fixed inset-0 z-40 hidden md:hidden">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
                <div class="relative flex-1 flex flex-col max-w-xs w-full bg-secondary">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button id="close-sidebar" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 text-white font-bold text-lg">Futsal Mate</span>
                            </div>
                        </div>
                        <nav class="mt-5 px-2 space-y-1">
                            <a href="user-dashboard.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                            <a href="booking.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">Book Court</span>
                            </a>
                            <a href="my-bookings.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span class="ml-3">My Bookings</span>
                            </a>
                            <a href="profile.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="ml-3">Profile</span>
                            </a>
                            <a href="index.html" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary-light hover:text-white rounded-lg transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="ml-3">Logout</span>
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="flex-shrink-0 w-14"></div>
            </div>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-100">
                <div class="py-6">
                    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="text-center mb-8">
                            <div class="inline-flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-900">Booking Confirmed!</h1>
                            <p class="mt-2 text-lg text-gray-600">Your futsal court has been successfully booked.</p>
                        </div>

                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6 bg-secondary text-white">
                                <h3 class="text-lg leading-6 font-medium">Booking Details</h3>
                                <p class="mt-1 max-w-2xl text-sm">Reference this information when you arrive</p>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Booking ID</dt>
                                        <dd class="mt-1 text-sm text-gray-900 font-semibold">BK12345</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Court</dt>
                                        <dd class="mt-1 text-sm text-gray-900">Court Alpha</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Date</dt>
                                        <dd class="mt-1 text-sm text-gray-900">May 15, 2023</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Time</dt>
                                        <dd class="mt-1 text-sm text-gray-900">6:00 PM - 7:00 PM</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Payment Method</dt>
                                        <dd class="mt-1 text-sm text-gray-900">eSewa</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Payment Status</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Amount</dt>
                                        <dd class="mt-1 text-sm text-gray-900 font-semibold">Rs. 1,200</dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:px-6 flex flex-col sm:flex-row gap-4 justify-end">
                                <a href="user-dashboard.html" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-secondary bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    Go to Dashboard
                                </a>
                                <a href="my-bookings.html" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    View All Bookings
                                </a>
                            </div>
                        </div>

                        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Important Information</h3>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                                <div class="space-y-4 text-sm text-gray-600">
                                    <p>• Please arrive at least 15 minutes before your scheduled time.</p>
                                    <p>• Bring your booking ID or confirmation email for verification.</p>
                                    <p>• Proper sports attire and footwear are required.</p>
                                    <p>• Cancellations must be made at least 24 hours in advance for a full refund.</p>
                                    <p>• For any questions or assistance, please contact us at support@futsalmate.com or call +977 9812345678.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
</body>
</html>
