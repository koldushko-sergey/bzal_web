@extends('layouts.app')
@section('title', $category->name)
@section('content')
<x-page-hero :title="$category->name" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Продукция', 'url' => route('products.index')],
    ['label' => $category->name],
]" />

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        @if($category->description)
            <p class="text-gray-600 mb-8 max-w-3xl">{{ $category->description }}</p>
        @endif
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($category->publishedProducts as $product)
                <a href="{{ route('products.show', [$category->slug, $product->slug]) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-44 object-cover">
                    @else
                        <div class="w-full h-44 bg-gray-100"></div>
                    @endif
                    <div class="p-5">
                        <h2 class="font-bold text-[#0b1325] group-hover:text-[#e31e24] transition text-sm">{{ $product->name }}</h2>
                        @if($product->excerpt)
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $product->excerpt }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <p class="text-gray-500 col-span-full">В данной категории пока нет продукции.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
