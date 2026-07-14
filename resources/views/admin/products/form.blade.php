@extends('layouts.admin')
@section('title', $product->exists ? 'Редактирование продукции' : 'Новая продукция')
@section('content')
<form action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-5">
    @csrf
    @if($product->exists) @method('PUT') @endif

    <x-admin.field label="Категория" name="product_category_id" type="select" :value="$product->product_category_id" :options="$categories->pluck('name', 'id')" required />
    <x-admin.field label="Название" name="name" :value="$product->name" required />
    <x-admin.field label="Краткое описание" name="excerpt" type="textarea" :value="$product->excerpt" :rows="2" />
    <x-admin.field label="Описание" name="description" type="textarea" :value="$product->description" :rows="3" />
    <x-admin.field label="Содержимое" name="content" type="wysiwyg" :value="$product->content" :rows="10" />
    <x-admin.field label="Порядок сортировки" name="sort_order" type="number" :value="$product->sort_order ?? 0" />
    <x-admin.field label="Изображение" name="image" type="file" :value="$product->image" />
    @if($product->image_url)
        <img src="{{ $product->image_url }}" alt="" class="h-24 rounded border">
    @endif
    <x-admin.field label="" name="is_published" type="checkbox" :value="$product->is_published ?? true" />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить</button>
        <a href="{{ route('admin.products.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">Отмена</a>
    </div>
</form>
@endsection
