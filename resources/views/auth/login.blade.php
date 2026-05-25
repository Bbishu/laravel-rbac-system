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
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-indigo-100 px-4">
        
        <div class="w-full max-w-5xl bg-white shadow-2xl rounded-3xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- Left Side -->
            <div class="hidden md:flex flex-col justify-center bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-12 relative">
                
                <div class="absolute inset-0 bg-black/10"></div>

                <div class="relative z-10">
                    <h1 class="text-5xl font-extrabold mb-6 leading-tight">
                        Welcome Back 👋
                    </h1>
                </div>
            </div>

            <!-- Right Side -->
            <div class="p-8 md:p-12">

                <!-- Logo / Brand -->
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold text-blue-600">
                        NexaCart
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Sign in to continue
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status 
                    class="mb-4" 
                    :status="session('status')" 
                />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label 
                            for="email" 
                            :value="__('Email Address')" 
                        />

                        <x-text-input 
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
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
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        />

                        <x-input-error 
                            :messages="$errors->get('password')" 
                            class="mt-2" 
                        />
                    </div>

                    <!-- Remember Me -->
                    <!-- <div class="flex items-center justify-between">
                        
                        <label for="remember_me" class="inline-flex items-center">
                            <input 
                                id="remember_me"
                                type="checkbox"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                name="remember"
                            >

                            <span class="ms-2 text-sm text-gray-600">
                                Remember me
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a 
                                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
                                href="{{ route('password.request') }}"
                            >
                                Forgot Password?
                            </a>
                        @endif
                    </div> -->

                    <!-- Login Button -->
                    <div>
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300"
                        >
                            Log In
                        </button>
                    </div>

                    <!-- Register -->
                    <div class="text-center pt-4">
                        <p class="text-gray-500">
                            Don’t have an account?

                            <a 
                                href="{{ route('register') }}"
                                class="text-blue-600 font-semibold hover:text-blue-800"
                            >
                                Create Account
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