<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Futsal Mate</title>
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
<body>
    <div class="flex min-h-screen bg-gray-100">

        @include('users.layouts.header')
        @yield('context')

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
        
    </div>
    

</body>
</html>