@extends('layouts.app')
@section('title', 'Новости')
@section('content')
<x-page-hero title="Новости" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Новости'],
]" />

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($news as $article)
                <article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    @if($article->image_url)
                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-44 object-cover">
                    @else
                        <div class="w-full h-44 bg-[#101b30]"></div>
                    @endif
                    <div class="p-5">
                        <time class="text-xs text-gray-500">{{ $article->published_at?->format('d.m.Y') }}</time>
                        <h2 class="mt-2 font-bold text-[#0b1325] text-sm">
                            <a href="{{ route('news.show', $article->slug) }}" class="hover:text-[#e31e24] transition">{{ $article->title }}</a>
                        </h2>
                        @if($article->excerpt)
                            <p class="mt-2 text-sm text-gray-600 line-clamp-3">{{ $article->excerpt }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-gray-500 col-span-full">Новостей пока нет.</p>
            @endforelse
        </div>
        <div class="mt-10">{{ $news->links() }}</div>
    </div>
</section>
@endsection
