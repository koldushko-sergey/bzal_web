@extends('layouts.app')
@section('title', $product->name)
@section('content')
<x-page-hero :title="$product->name" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Продукция', 'url' => route('products.index')],
    ['label' => $category->name, 'url' => route('products.category', $category->slug)],
    ['label' => $product->name],
]" />

<section class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        @if($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full rounded-lg mb-8 shadow-md">
        @endif
        @if($product->description)
            <p class="text-lg text-gray-700 mb-6">{{ $product->description }}</p>
        @endif
        @if($product->content)
            <div class="prose prose-lg max-w-none prose-headings:text-[#0b1325] prose-a:text-[#e31e24]">
                {!! $product->content !!}
            </div>
        @endif
        <div class="mt-10">
            <a href="{{ route('contacts.index') }}" class="inline-block bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-xs px-8 py-4 rounded transition">
                Запросить консультацию
            </a>
        </div>
    </div>
</section>
@endsection
