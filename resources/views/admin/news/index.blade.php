@extends('layouts.admin')
@section('title', 'Новости')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Управление новостями</p>
    <a href="{{ route('admin.news.create') }}" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-4 py-2 rounded">+ Добавить</a>
</div>
<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="text-left px-4 py-3 font-semibold">Заголовок</th>
                <th class="text-left px-4 py-3 font-semibold">Дата</th>
                <th class="text-left px-4 py-3 font-semibold">Статус</th>
                <th class="text-right px-4 py-3 font-semibold">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $article)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $article->title }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $article->published_at?->format('d.m.Y') ?? '—' }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-0.5 rounded text-xs {{ $article->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $article->is_published ? 'Опубликовано' : 'Черновик' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.news.edit', $article) }}" class="text-[#0b1325] hover:underline">Изменить</a>
                        <form action="{{ route('admin.news.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Удалить?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $news->links() }}</div>
@endsection
