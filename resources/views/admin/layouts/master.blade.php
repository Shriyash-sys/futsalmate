<!DOCTYPE html>
<html lang="en" class="dark">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Bookings - Futsal System</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
    darkMode: 'class',
    }
</script>
</head>
<body class="bg-black text-white font-sans">
    
    <div class="flex h-screen overflow-hidden">
        @include('admin.layouts.header')

        <main class="flex-1 overflow-y-auto">
            @yield('conduct')
        </main>
    </div>

</body>
</html>