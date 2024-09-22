<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-900 text-white">
    <main class="min-h-screen font-sans antialiased">
        <header class="max-w-screen-2xl mx-auto w-full h-14 p-4">
            <nav class="flex items-center justify-between">
                <a href="{{route('dashboard')}}" class="flex items-center gap-4">
                    <img src="/logo.png" alt="logo" height="35" width="25" />
                    <h1 class="text-xl md:text-2xl uppercase font-extrabold">PIZZA HUT</h1>
                </a>


                <a href="{{route('dashboard')}}" wire:navigate>
                    <x-lucide-x class="size-6" />
                </a>
            </nav>
        </header>

        {{ $slot }}
    </main>
</body>

</html>