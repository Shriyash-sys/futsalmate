<!DOCTYPE html>
<html lang="en" class="dark">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Admin Signup</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
    darkMode: 'class',
    }
</script>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center font-sans">

<div class="w-full max-w-md bg-gray-900 p-8 rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-center">Admin Signup</h2>

    <form action="{{route('admin.signup')}}" method="POST" class="space-y-5">
    @csrf
    <!-- Full Name -->
    <div>
        <label class="block mb-1 text-gray-300" for="name">Full Name</label>
        <input id="name" name="full_name" type="text" required
        class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600"/>
    </div>

    <!-- Email -->
    <div>
        <label class="block mb-1 text-gray-300" for="email">Email</label>
        <input id="email" name="email" type="email" required
        class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600"/>
    </div>

    <!-- Password -->
    <div>
        <label class="block mb-1 text-gray-300" for="password">Password</label>
        <input id="password" name="password" type="password" required
        class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600"/>
    </div>

    <!-- Confirm Password -->
    <div>
        <label class="block mb-1 text-gray-300" for="confirmPassword">Confirm Password</label>
        <input id="confirmPassword" name="password_confirmation" type="password" required
        class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600"/>
    </div>

    <!-- Submit -->
    <div>
        <button type="submit"
        class="w-full py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold text-white transition duration-200">
        Sign Up
        </button>
    </div>
    </form>

    <!-- Link to Login -->
    <p class="text-center text-sm text-gray-400 mt-6">
    Already have an account? <a href="{{route('admin')}}" class="text-blue-500 hover:underline">Log In</a>
    </p>
</div>

</body>
</html>
