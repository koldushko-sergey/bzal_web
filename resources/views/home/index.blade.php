@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<section class="relative bg-[#0b1325] text-white overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.15\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    <div class="absolute right-0 top-0 bottom-0 w-1/3 hidden lg:block bg-gradient-to-l from-[#e31e24]/10 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-20 sm:py-28">
        <p class="text-[#e31e24] font-bold uppercase tracking-widest text-xs mb-4">ОАО «БЗАЛ» · с 1974 года</p>
        <h1 class="text-3xl sm:text-5xl font-black uppercase tracking-wide leading-tight max-w-3xl">
            {{ $heroTitle }}
        </h1>
        <p class="mt-6 text-gray-300 text-lg max-w-2xl leading-relaxed">
            {{ $heroSubtitle }}
        </p>
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="{{ route('products.index') }}" class="bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-xs px-8 py-4 rounded transition">
                Каталог продукции
            </a>
            <a href="{{ route('contacts.index') }}" class="border border-white/30 hover:border-white text-white font-bold uppercase tracking-wider text-xs px-8 py-4 rounded transition">
                Связаться с нами
            </a>
        </div>
    </div>
</section>

<section class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($stats as $stat)
                <div class="text-center lg:text-left">
                    <p class="text-3xl sm:text-4xl font-black text-[#e31e24]">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-xs uppercase tracking-wider text-gray-500 font-semibold">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-xl font-black uppercase tracking-wide text-[#0b1325] mb-4">О предприятии</h2>
                <p class="text-gray-600 leading-relaxed">{{ $aboutTeaser }}</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('about.company') }}" class="text-[#e31e24] text-sm font-semibold uppercase tracking-wider hover:underline">Подробнее о заводе →</a>
                    <a href="{{ route('about.history') }}" class="text-gray-500 text-sm font-semibold uppercase tracking-wider hover:text-[#0b1325]">История →</a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('about.company') }}" class="bg-[#0b1325] text-white p-6 rounded-lg hover:bg-[#162542] transition">
                    <p class="text-2xl font-black mb-2">01</p>
                    <p class="text-sm font-bold uppercase tracking-wide">ОАО «БЗАЛ»</p>
                </a>
                <a href="{{ route('about.team') }}" class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-md transition">
                    <p class="text-2xl font-black text-[#e31e24] mb-2">02</p>
                    <p class="text-sm font-bold uppercase tracking-wide text-[#0b1325]">Команда</p>
                </a>
                <a href="{{ route('products.index') }}" class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-md transition">
                    <p class="text-2xl font-black text-[#e31e24] mb-2">03</p>
                    <p class="text-sm font-bold uppercase tracking-wide text-[#0b1325]">Продукция</p>
                </a>
                <a href="{{ route('about.corporate') }}" class="bg-[#e31e24] text-white p-6 rounded-lg hover:bg-[#c21419] transition">
                    <p class="text-2xl font-black mb-2">04</p>
                    <p class="text-sm font-bold uppercase tracking-wide">Корпоративная информация</p>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-black uppercase tracking-wide text-[#0b1325]">Продукция</h2>
            <a href="{{ route('products.index') }}" class="text-[#e31e24] text-sm font-semibold uppercase tracking-wider hover:underline">Весь каталог</a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('products.category', $category->slug) }}" class="group block bg-gray-50 border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg hover:border-[#0b1325]/20 transition">
                    @if($category->image_url)
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-[#101b30] flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-bold text-[#0b1325] group-hover:text-[#e31e24] transition uppercase text-sm tracking-wide">{{ $category->name }}</h3>
                        @if($category->description)
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $category->description }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@if($latestNews->count())
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-black uppercase tracking-wide text-[#0b1325]">Новости</h2>
            <a href="{{ route('news.index') }}" class="text-[#e31e24] text-sm font-semibold uppercase tracking-wider hover:underline">Все новости</a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($latestNews as $article)
                <article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                    @if($article->image_url)
                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-[#101b30] flex items-end p-4">
                            <time class="text-xs text-gray-400">{{ $article->published_at?->format('d.m.Y') }}</time>
                        </div>
                    @endif
                    <div class="p-5 flex-1 flex flex-col">
                        @if($article->image_url)
                            <time class="text-xs text-gray-500">{{ $article->published_at?->format('d.m.Y') }}</time>
                        @endif
                        <h3 class="mt-2 font-bold text-[#0b1325] text-sm leading-snug flex-1">
                            <a href="{{ route('news.show', $article->slug) }}" class="hover:text-[#e31e24] transition">{{ $article->title }}</a>
                        </h3>
                        @if($article->excerpt)
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $article->excerpt }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-16 bg-[#0b1325] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-2xl font-black uppercase tracking-wide mb-4">Нужна консультация?</h2>
        <p class="text-gray-400 max-w-xl mx-auto mb-8">Свяжитесь с отделом маркетинга и продаж для получения коммерческого предложения</p>
        <a href="{{ route('contacts.index') }}" class="inline-block bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-xs px-10 py-4 rounded transition">
            Связаться с нами
        </a>
    </div>
</section>
@endsection
