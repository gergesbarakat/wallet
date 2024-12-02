<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'wallet') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('style.css') }}" rel="stylesheet" />

    <!-- Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-sans antialiased h-screen max-h-screen">

    @if (session()->has('success'))
        <script>
            Swal.fire('', '{{ session()->get('success') }}', 'success')
        </script>
    @endif
    @if ($errors->has('*'))
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire('', '{{ $error }}', 'error')
            </script>
         @endforeach
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire('', '{{ session()->get('error') }}', 'error')
        </script>
    @endif

    <div class="min-h-screen bg-gray-100 justify-center  h-screen   dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="  bg-white dark:bg-gray-800 shadow h-1/6  max-h-20">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="h-4/6    content-center items-center   w-full">
            {{ $slot }}
        </main>
    </div>
</body>
<script src="{{ asset('script.js') }}"></script>

</html>
