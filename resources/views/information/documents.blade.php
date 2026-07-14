@extends('layouts.app')
@section('title', $page->title)
@section('content')
<x-page-hero :title="$page->title" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Информация'],
    ['label' => $page->title],
]" />

<section class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="prose prose-lg max-w-none prose-headings:text-[#0b1325] prose-a:text-[#e31e24] mb-10">
            {!! $page->content !!}
        </div>

        @if($documents->count())
            <h2 class="text-lg font-bold uppercase tracking-wide text-[#0b1325] mb-4">Файлы для скачивания</h2>
            <ul class="space-y-3">
                @foreach($documents as $document)
                    <li>
                        <a href="{{ $document->file_url }}" target="_blank" class="flex items-center gap-3 p-4 bg-white border border-gray-200 rounded-lg hover:border-[#e31e24] transition">
                            <svg class="w-5 h-5 text-[#e31e24] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span class="text-sm font-medium text-[#0b1325]">{{ $document->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
@endsection
