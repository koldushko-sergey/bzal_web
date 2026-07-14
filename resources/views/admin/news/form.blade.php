@extends('layouts.admin')
@section('title', $article->exists ? 'Редактирование новости' : 'Новая новость')
@section('content')
<form action="{{ $article->exists ? route('admin.news.update', $article) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-5">
    @csrf
    @if($article->exists) @method('PUT') @endif

    <x-admin.field label="Заголовок" name="title" :value="$article->title" required />
    <x-admin.field label="Краткое описание" name="excerpt" type="textarea" :value="$article->excerpt" :rows="3" />
    <x-admin.field label="Содержимое" name="content" type="wysiwyg" :value="$article->content" :rows="12" />
    <x-admin.field label="Дата публикации" name="published_at" type="datetime-local" :value="$article->published_at?->format('Y-m-d\TH:i')" />
    <x-admin.field label="Изображение" name="image" type="file" :value="$article->image" />
    @if($article->image_url)
        <img src="{{ $article->image_url }}" alt="" class="h-24 rounded border">
    @endif
    <x-admin.field label="" name="is_published" type="checkbox" :value="$article->is_published ?? true" />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить</button>
        <a href="{{ route('admin.news.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">Отмена</a>
    </div>
</form>
@endsection
