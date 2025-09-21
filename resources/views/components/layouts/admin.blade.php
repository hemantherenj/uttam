<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="dashboard()" x-init="init()"
    :class="{ 'dark': darkMode }" class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset="UTF-8">
    <!-- Google Icons (for demo) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
    {{-- <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script> --}}
</head>

<body class="h-full flex">

    {{-- <div x-data="dashboard()" x-init="init()" class="flex h-screen bg-gray-100 dark:bg-gray-900"
        :class="{ 'dark': darkMode }"> --}}

    <!-- Sidebar -->
    <x-back.sidebar />




    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <x-back.header />


        <!-- Page Content -->
        <main class="p-1 flex-1 overflow-y-auto text-gray-800 dark:text-gray-200">
            {{ $slot }}
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="mobileSidebar" class="fixed inset-0 bg-gray-100 bg-opacity-50 z-20 md:hidden"
        @click="mobileSidebar = false"></div>
    {{-- </div> --}}

    <x-back.footer />


    @livewireScripts
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

    <script>
        document.addEventListener("livewire:navigated", () => {
            // Alpine ko re-init karne ke liye
            if (window.Alpine) {
                window.Alpine.flushAndStopDeferringMutations();
                window.Alpine.start();
            }
        });
    </script>

</body>

</html>
