<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <div class="">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-white to-blue-100 px-4">

        <div class="w-full max-w-6xl bg-white shadow-2xl rounded-3xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Left Side -->
            <div class="hidden md:flex flex-col justify-center bg-gradient-to-br from-indigo-600 to-blue-700 text-white p-12 relative">

                <div class="absolute inset-0 bg-black/10"></div>

                <div class="relative z-10">
                    <h1 class="text-5xl font-extrabold mb-6 leading-tight">
                        Join NexaCart 🚀
                    </h1>
                </div>
            </div>

            <!-- Right Side -->
            <div class="p-8 md:p-12">

                <!-- Brand -->
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold text-indigo-600">
                        NexaCart
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Create your new account
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label 
                            for="name" 
                            :value="__('Full Name')" 
                        />

                        <x-text-input 
                            id="name"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                        />

                        <x-input-error 
                            :messages="$errors->get('name')" 
                            class="mt-2" 
                        />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label 
                            for="email" 
                            :value="__('Email Address')" 
                        />

                        <x-text-input 
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="Enter your email"
                        />

                        <x-input-error 
                            :messages="$errors->get('email')" 
                            class="mt-2" 
                        />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label 
                            for="password" 
                            :value="__('Password')" 
                        />

                        <x-text-input 
                            id="password"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password"
                        />

                        <x-input-error 
                            :messages="$errors->get('password')" 
                            class="mt-2" 
                        />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label 
                            for="password_confirmation" 
                            :value="__('Confirm Password')" 
                        />

                        <x-text-input 
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                        />

                        <x-input-error 
                            :messages="$errors->get('password_confirmation')" 
                            class="mt-2" 
                        />
                    </div>

                    <!-- Register Button -->
                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300"
                        >
                            Create Account
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center pt-4">
                        <p class="text-gray-500">
                            Already have an account?

                            <a 
                                href="{{ route('login') }}"
                                class="text-indigo-600 font-semibold hover:text-indigo-800"
                            >
                                Sign In
                            </a>
                        </p>
                    </div>

                </form>

            </div>

        </div>

    </div>
        </div>
    </body>
</html>