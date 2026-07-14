@extends('layouts.admin')
@section('title', 'Документы')
@section('content')
<div class="flex justify-between items-center mb-6">
    <a href="{{ route('admin.documents.create') }}" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-4 py-2 rounded">+ Добавить</a>
</div>
<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="text-left px-4 py-3 font-semibold">Название</th>
                <th class="text-left px-4 py-3 font-semibold">Категория</th>
                <th class="text-right px-4 py-3 font-semibold">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $document->title }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $document->category }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ $document->file_url }}" target="_blank" class="text-gray-500 hover:underline">Файл</a>
                        <a href="{{ route('admin.documents.edit', $document) }}" class="text-[#0b1325] hover:underline">Изменить</a>
                        <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" class="inline" onsubmit="return confirm('Удалить?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $documents->links() }}</div>
@endsection
