@extends('layouts.app')
@section('title', $article->title)
@section('content')
<x-page-hero :title="$article->title" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Новости', 'url' => route('news.index')],
    ['label' => $article->title],
]" />

<section class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <time class="text-sm text-gray-500">{{ $article->published_at?->format('d.m.Y') }}</time>
        @if($article->image_url)
            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full rounded-lg my-6 shadow-md">
        @endif
        <div class="prose prose-lg max-w-none prose-headings:text-[#0b1325] prose-a:text-[#e31e24]">
            {!! $article->content !!}
        </div>
    </div>
</section>
@endsection
