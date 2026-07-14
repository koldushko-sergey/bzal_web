@extends('layouts.app')
@section('title', $page->title)
@section('content')
<x-page-hero :title="$page->title" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Электронные обращения'],
    ['label' => 'Для юридических лиц и ИП'],
]" />

<section class="py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6">
        <div class="prose max-w-none mb-8 text-gray-600">{!! $page->content !!}</div>

        <form action="{{ route('appeals.business.store') }}" method="POST" class="space-y-5 bg-white p-6 sm:p-8 rounded-lg border border-gray-200 shadow-sm">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-[#0b1325] mb-1">Наименование организации *</label>
                <input type="text" name="company" value="{{ old('company') }}" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
                @error('company')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-[#0b1325] mb-1">УНП</label>
                <input type="text" name="unp" value="{{ old('unp') }}" class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
            </div>
            <div>
                <label class="block text-sm font-semibold text-[#0b1325] mb-1">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
                @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-[#0b1325] mb-1">Телефон *</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
                @error('phone')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-[#0b1325] mb-1">Текст обращения *</label>
                <textarea name="message" rows="6" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">{{ old('message') }}</textarea>
                @error('message')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-xs px-8 py-3 rounded transition">
                Отправить обращение
            </button>
        </form>
    </div>
</section>
@endsection
