@extends('layouts.app')
@section('title', $page->title)
@section('content')
<x-page-hero :title="$page->title" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => $page->title],
]" />

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="prose max-w-none mb-10 text-gray-600">{!! $page->content !!}</div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($items as $item)
                <article class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    @if($item->image_url)
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-44 object-cover">
                    @else
                        <div class="w-full h-44 bg-gray-100"></div>
                    @endif
                    <div class="p-5">
                        <h2 class="font-bold text-[#0b1325] text-sm">{{ $item->title }}</h2>
                        @if($item->description)
                            <p class="mt-2 text-sm text-gray-600">{{ $item->description }}</p>
                        @endif
                        @if($item->price)
                            <p class="mt-3 text-[#e31e24] font-bold">{{ number_format($item->price, 2, ',', ' ') }} BYN</p>
                        @endif
                        @if($item->contact_info)
                            <p class="mt-2 text-xs text-gray-500">Контакт: {{ $item->contact_info }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-gray-500 col-span-full">Нет доступных позиций.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
