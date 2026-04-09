<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume Builder</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800 bg-gray-50 relative min-h-screen pb-20">

    <!-- Header -->
    <header class="bg-white border-b shadow-sm w-full">
        <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
            
            <span class="text-xl font-bold">Resume Builder</span>
            
            <div class="space-x-3">
                <a href="{{ route('login') }}" class="px-3 py-1.5 rounded hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-1.5 rounded hover:bg-gray-100">Register</a>
            </div>

        </div>
    </header>

    <!-- Content -->
    <main class="flex justify-center items-center text-center px-4" style="min-height: calc(100vh - 120px);">
        <div class="space-y-5 max-w-xl">
            
            <h1 class="text-4xl font-bold">
                Build a Professional Resume in Minutes
            </h1>
            
            <p class="text-gray-600">
                Create ATS-friendly resumes and get hired faster.
            </p>

        </div>
    </main>

    <!-- Footer (FORCED BOTTOM) -->
    <footer class="absolute bottom-0 left-0 w-full bg-white border-t text-center py-4">
        <p class="text-sm text-gray-500">
            © {{ date('Y') }} Resume Builder
        </p>
        <p class="text-xs text-indigo-600 mt-1">
            Create. Apply. Succeed.
        </p>
    </footer>

</body>
</html>