@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    @foreach([
        ['label' => 'Страницы', 'count' => $stats['pages'], 'route' => 'admin.pages.index'],
        ['label' => 'Новости', 'count' => $stats['news'], 'route' => 'admin.news.index'],
        ['label' => 'Категории', 'count' => $stats['categories'], 'route' => 'admin.categories.index'],
        ['label' => 'Продукция', 'count' => $stats['products'], 'route' => 'admin.products.index'],
        ['label' => 'Неликвиды', 'count' => $stats['liquidation'], 'route' => 'admin.liquidation.index'],
        ['label' => 'Новые обращения', 'count' => $stats['submissions'], 'route' => 'admin.submissions.index'],
    ] as $stat)
        <a href="{{ route($stat['route']) }}" class="bg-white rounded-lg border border-gray-200 p-5 hover:shadow-md transition">
            <p class="text-3xl font-black text-[#0b1325]">{{ $stat['count'] }}</p>
            <p class="text-sm text-gray-500 mt-1">{{ $stat['label'] }}</p>
        </a>
    @endforeach
</div>

<div class="bg-white rounded-lg border border-gray-200 p-6">
    <h2 class="font-bold text-[#0b1325] mb-4">Быстрые действия</h2>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.news.create') }}" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-4 py-2 rounded">+ Новость</a>
        <a href="{{ route('admin.products.create') }}" class="bg-[#0b1325] text-white text-xs font-bold uppercase px-4 py-2 rounded">+ Продукция</a>
        <a href="{{ route('admin.settings.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-4 py-2 rounded">Настройки</a>
    </div>
</div>
@endsection
