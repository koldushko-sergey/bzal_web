@extends('layouts.admin')
@section('title', $document->exists ? 'Редактирование документа' : 'Новый документ')
@section('content')
<form action="{{ $document->exists ? route('admin.documents.update', $document) : route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-5">
    @csrf
    @if($document->exists) @method('PUT') @endif

    <x-admin.field label="Название" name="title" :value="$document->title" required />
    <x-admin.field label="Категория" name="category" :value="$document->category ?? 'documents'" />
    <x-admin.field label="Порядок сортировки" name="sort_order" type="number" :value="$document->sort_order ?? 0" />
    <x-admin.field label="Файл" name="file" type="file" :value="$document->file_path" :required="!$document->exists" />
    <x-admin.field label="" name="is_published" type="checkbox" :value="$document->is_published ?? true" />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить</button>
        <a href="{{ route('admin.documents.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">Отмена</a>
    </div>
</form>
@endsection
