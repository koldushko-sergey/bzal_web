@extends('layouts.app')
@section('title', 'Продукция')
@section('content')
<x-page-hero title="Продукция" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Продукция'],
]" />

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('products.category', $category->slug) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                    @if($category->image_url)
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-[#101b30] flex items-center justify-center text-gray-500 text-sm uppercase tracking-wider">БЗАЛ</div>
                    @endif
                    <div class="p-5">
                        <h2 class="font-bold text-[#0b1325] group-hover:text-[#e31e24] transition uppercase text-sm">{{ $category->name }}</h2>
                        @if($category->description)
                            <p class="mt-2 text-sm text-gray-600">{{ $category->description }}</p>
                        @endif
                        <p class="mt-3 text-xs text-gray-400">{{ $category->published_products_count ?? $category->publishedProducts->count() }} позиций</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
