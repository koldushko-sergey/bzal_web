@extends('layouts.admin')
@section('title', $item->exists ? 'Редактирование позиции' : 'Новая позиция')
@section('content')
<form action="{{ $item->exists ? route('admin.liquidation.update', $item) : route('admin.liquidation.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-5">
    @csrf
    @if($item->exists) @method('PUT') @endif

    <x-admin.field label="Название" name="title" :value="$item->title" required />
    <x-admin.field label="Описание" name="description" type="textarea" :value="$item->description" />
    <x-admin.field label="Цена (BYN)" name="price" type="number" :value="$item->price" />
    <x-admin.field label="Контактная информация" name="contact_info" :value="$item->contact_info" />
    <x-admin.field label="Порядок сортировки" name="sort_order" type="number" :value="$item->sort_order ?? 0" />
    <x-admin.field label="Изображение" name="image" type="file" :value="$item->image" />
    @if($item->image_url)
        <img src="{{ $item->image_url }}" alt="" class="h-24 rounded border">
    @endif
    <x-admin.field label="" name="is_published" type="checkbox" :value="$item->is_published ?? true" />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить</button>
        <a href="{{ route('admin.liquidation.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">Отмена</a>
    </div>
</form>
@endsection
