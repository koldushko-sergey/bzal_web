<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель') — БЗАЛ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.min.css">
    <script src="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.umd.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-[#0b1325] text-white shrink-0 hidden md:block">
            <div class="p-6 border-b border-gray-700">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-black uppercase tracking-wider">БЗАЛ Admin</a>
            </div>
            <nav class="p-4 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.dashboard') ? 'bg-[#162542]' : '' }}">Дashboard</a>
                <a href="{{ route('admin.pages.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.pages.*') ? 'bg-[#162542]' : '' }}">Страницы</a>
                <a href="{{ route('admin.news.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.news.*') ? 'bg-[#162542]' : '' }}">Новости</a>
                <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.categories.*') ? 'bg-[#162542]' : '' }}">Категории продукции</a>
                <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.products.*') ? 'bg-[#162542]' : '' }}">Продукция</a>
                <a href="{{ route('admin.documents.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.documents.*') ? 'bg-[#162542]' : '' }}">Документы</a>
                <a href="{{ route('admin.liquidation.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.liquidation.*') ? 'bg-[#162542]' : '' }}">Неликвиды</a>
                <a href="{{ route('admin.submissions.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.submissions.*') ? 'bg-[#162542]' : '' }}">Обращения</a>
                <a href="{{ route('admin.settings.index') }}" class="block px-3 py-2 rounded hover:bg-[#162542] {{ request()->routeIs('admin.settings.*') ? 'bg-[#162542]' : '' }}">Настройки сайта</a>
                <hr class="border-gray-700 my-3">
                <a href="{{ route('home') }}" target="_blank" class="block px-3 py-2 rounded hover:bg-[#162542]">Открыть сайт</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <h1 class="text-lg font-bold text-[#0b1325]">@yield('title', 'Админ-панель')</h1>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 hover:text-[#e31e24]">Выйти</button>
                </form>
            </header>

            @if(session('success'))
                <div class="mx-6 mt-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <main class="p-6 flex-1">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
