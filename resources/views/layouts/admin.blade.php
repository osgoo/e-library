<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Admin Panel') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-900 text-gray-400">
    <div class="flex h-screen overflow-hidden">

        @include('layouts.inc.admin.sidebar')

        <div class="flex flex-col flex-1 overflow-hidden">

            <header class="flex-shrink-0 bg-gray-900 border-b border-gray-800">
                @include('layouts.inc.admin.header')
            </header>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-800">
                @yield('content')
            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Амжилттай!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Хаах',
                background: '#1f2937',
                color: '#d1d5db'
            });
        </script>
    @endif
    @stack('scripts')
</body>
</html>
