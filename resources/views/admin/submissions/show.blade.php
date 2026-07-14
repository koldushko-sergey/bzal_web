@extends('layouts.admin')
@section('title', 'Обращение #'.$submission->id)
@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg border border-gray-200 p-6 space-y-4">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">{{ $submission->typeLabel() }}</p>
                <h2 class="text-lg font-bold text-[#0b1325] mt-1">{{ $submission->company ?? $submission->name ?? 'Без имени' }}</h2>
            </div>
            <time class="text-sm text-gray-500">{{ $submission->created_at->format('d.m.Y H:i') }}</time>
        </div>

        <dl class="grid sm:grid-cols-2 gap-4 text-sm">
            <div>
                <dt class="text-gray-500">Email</dt>
                <dd class="font-medium"><a href="mailto:{{ $submission->email }}" class="text-[#e31e24]">{{ $submission->email }}</a></dd>
            </div>
            @if($submission->phone)
                <div>
                    <dt class="text-gray-500">Телефон</dt>
                    <dd class="font-medium">{{ $submission->phone }}</dd>
                </div>
            @endif
            @if($submission->unp)
                <div>
                    <dt class="text-gray-500">УНП</dt>
                    <dd class="font-medium">{{ $submission->unp }}</dd>
                </div>
            @endif
            @if($submission->ip_address)
                <div>
                    <dt class="text-gray-500">IP</dt>
                    <dd class="font-medium">{{ $submission->ip_address }}</dd>
                </div>
            @endif
        </dl>

        <div>
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-2">Сообщение</p>
            <div class="bg-gray-50 rounded p-4 text-sm whitespace-pre-wrap">{{ $submission->message }}</div>
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <a href="{{ route('admin.submissions.index') }}" class="border border-gray-300 text-xs font-bold uppercase px-6 py-3 rounded">← Назад</a>
        <form action="{{ route('admin.submissions.destroy', $submission) }}" method="POST" onsubmit="return confirm('Удалить обращение?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-600 text-xs font-bold uppercase px-6 py-3 rounded border border-red-200">Удалить</button>
        </form>
    </div>
</div>
@endsection
