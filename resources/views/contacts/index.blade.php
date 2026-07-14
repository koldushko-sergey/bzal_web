@extends('layouts.app')
@section('title', $page->title)
@section('content')
<x-page-hero :title="$page->title" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'Контакты'],
]" />

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <div class="prose max-w-none mb-8 text-gray-600">{!! $page->content !!}</div>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Приёмная</dt>
                        <dd class="mt-1"><a href="tel:{{ preg_replace('/[^\d+]/', '', $phone) }}" class="text-lg font-bold text-[#0b1325] hover:text-[#e31e24] transition">{{ $phone }}</a></dd>
                    </div>
                    @if($phoneMarketing ?? false)
                    <div>
                        <dt class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Отдел маркетинга и продаж</dt>
                        <dd class="mt-1"><a href="tel:{{ preg_replace('/[^\d+]/', '', $phoneMarketing) }}" class="text-lg font-bold text-[#0b1325] hover:text-[#e31e24] transition">{{ $phoneMarketing }}</a></dd>
                    </div>
                    @endif
                    <div>
                        <dt class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Email</dt>
                        <dd class="mt-1"><a href="mailto:{{ $email }}" class="text-lg font-bold text-[#0b1325] hover:text-[#e31e24] transition">{{ $email }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Адрес</dt>
                        <dd class="mt-1 text-[#0b1325] font-medium">{{ $address }}</dd>
                    </div>
                </dl>
            </div>

            <div>
                <form action="{{ route('contacts.store') }}" method="POST" class="space-y-5 bg-white p-6 sm:p-8 rounded-lg border border-gray-200 shadow-sm">
                    @csrf
                    <h2 class="text-lg font-bold uppercase tracking-wide text-[#0b1325] mb-2">Напишите нам</h2>
                    <div>
                        <label class="block text-sm font-semibold text-[#0b1325] mb-1">Имя *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
                        @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#0b1325] mb-1">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
                        @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#0b1325] mb-1">Телефон</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#0b1325] mb-1">Сообщение *</label>
                        <textarea name="message" rows="5" required class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-xs px-8 py-3 rounded transition">
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
