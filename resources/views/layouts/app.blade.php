<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'БЗАЛ') — Барановичский завод автоматических линий</title>
    @if(isset($page) && $page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('bzal_a11y') === '1') {
            document.documentElement.classList.add('a11y-mode');
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">
    @include('components.header')

    @if(session('success'))
        <div class="bg-green-600 text-white text-center py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
