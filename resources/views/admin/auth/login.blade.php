<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход — БЗАЛ Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0b1325] min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md mx-4">
        <h1 class="text-2xl font-black uppercase tracking-wider text-[#0b1325] mb-2">БЗАЛ Admin</h1>
        <p class="text-sm text-gray-500 mb-6">Вход в панель управления</p>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded text-sm mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Пароль</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
            </div>
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" class="rounded">
                Запомнить меня
            </label>
            <button type="submit" class="w-full bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-xs py-3 rounded transition">
                Войти
            </button>
        </form>
    </div>
</body>
</html>
