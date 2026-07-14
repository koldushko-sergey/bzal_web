@extends('layouts.admin')
@section('title', 'Страницы')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Редактирование текстовых страниц сайта</p>
    <a href="{{ route('admin.pages.create') }}" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-4 py-2 rounded">+ Добавить</a>
</div>

<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="text-left px-4 py-3 font-semibold">Заголовок</th>
                <th class="text-left px-4 py-3 font-semibold">Slug</th>
                <th class="text-left px-4 py-3 font-semibold">Статус</th>
                <th class="text-right px-4 py-3 font-semibold">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $page->title }}</td>
                    <td class="px-4 py-3 text-gray-500 font-mono text-xs">{{ $page->slug }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-0.5 rounded text-xs {{ $page->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $page->is_published ? 'Опубликовано' : 'Черновик' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.pages.edit', $page) }}" class="text-[#0b1325] hover:underline">Изменить</a>
                        <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline" onsubmit="return confirm('Удалить страницу?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
