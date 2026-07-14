@extends('layouts.admin')
@section('title', $category->exists ? 'Редактирование категории' : 'Новая категория')
@section('content')
<form action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-5">
    @csrf
    @if($category->exists) @method('PUT') @endif

    <x-admin.field label="Название" name="name" :value="$category->name" required />
    <x-admin.field label="Описание" name="description" type="textarea" :value="$category->description" />
    <x-admin.field label="Порядок сортировки" name="sort_order" type="number" :value="$category->sort_order ?? 0" />
    <x-admin.field label="Изображение" name="image" type="file" :value="$category->image" />
    @if($category->image_url)
        <img src="{{ $category->image_url }}" alt="" class="h-24 rounded border">
    @endif
    <x-admin.field label="" name="is_published" type="checkbox" :value="$category->is_published ?? true" />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить</button>
        <a href="{{ route('admin.categories.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">Отмена</a>
    </div>
</form>
@endsection
