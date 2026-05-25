<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NexaCart - Premium eCommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
    NexaCart
    </a>

    <!-- Links -->
    <div class="space-x-6 text-gray-700 font-medium">

        <a href="{{ url('/') }}" class="hover:text-blue-600">Home</a>

        <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>

        <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>

    </div>

</nav>

<div class="text-center mt-20">

    <h1 class="text-4xl font-bold text-gray-800">
        Welcome to NexaCart 🛒
    </h1>

    <p class="text-gray-600 mt-4">
        Your premium destination for online shopping
    </p>

</div>

<!-- CONTENT -->
<main class="p-6">
    @yield('content')
</main>

</body>
</html>