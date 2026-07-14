@extends('layouts.admin')
@section('title', $page->exists ? 'Редактирование страницы' : 'Новая страница')
@section('content')
<form action="{{ $page->exists ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-5">
    @csrf
    @if($page->exists) @method('PUT') @endif

    <x-admin.field label="Заголовок" name="title" :value="$page->title" required />
    @if($page->exists)
        <p class="text-xs text-gray-500 -mt-3">Slug: <code>{{ $page->slug }}</code></p>
    @endif
    <x-admin.field label="Содержимое" name="content" type="wysiwyg" :value="$page->content" :rows="12" />
    <x-admin.field label="Meta title" name="meta_title" :value="$page->meta_title" />
    <x-admin.field label="Meta description" name="meta_description" type="textarea" :value="$page->meta_description" :rows="2" />
    <x-admin.field label="Изображение" name="image" type="file" :value="$page->image" />
    @if($page->image_url)
        <img src="{{ $page->image_url }}" alt="" class="h-24 rounded border">
    @endif
    <x-admin.field label="" name="is_published" type="checkbox" :value="$page->is_published ?? true" />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить</button>
        <a href="{{ route('admin.pages.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">Отмена</a>
    </div>
</form>
@endsection
