@extends('layouts.admin')
@section('title', 'Обращения')
@section('content')
<div class="mb-6 flex gap-3">
    <a href="{{ route('admin.submissions.index') }}" class="text-xs font-bold uppercase px-3 py-1.5 rounded {{ !request('type') ? 'bg-[#0b1325] text-white' : 'bg-white border' }}">Все</a>
    <a href="{{ route('admin.submissions.index', ['type' => 'contact']) }}" class="text-xs font-bold uppercase px-3 py-1.5 rounded {{ request('type') === 'contact' ? 'bg-[#0b1325] text-white' : 'bg-white border' }}">Контакты</a>
    <a href="{{ route('admin.submissions.index', ['type' => 'citizen_appeal']) }}" class="text-xs font-bold uppercase px-3 py-1.5 rounded {{ request('type') === 'citizen_appeal' ? 'bg-[#0b1325] text-white' : 'bg-white border' }}">Граждане</a>
    <a href="{{ route('admin.submissions.index', ['type' => 'business_appeal']) }}" class="text-xs font-bold uppercase px-3 py-1.5 rounded {{ request('type') === 'business_appeal' ? 'bg-[#0b1325] text-white' : 'bg-white border' }}">Юр. лица</a>
</div>

<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="text-left px-4 py-3 font-semibold">Дата</th>
                <th class="text-left px-4 py-3 font-semibold">Тип</th>
                <th class="text-left px-4 py-3 font-semibold">Отправитель</th>
                <th class="text-left px-4 py-3 font-semibold">Email</th>
                <th class="text-right px-4 py-3 font-semibold">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($submissions as $submission)
                <tr class="border-b last:border-0 hover:bg-gray-50 {{ !$submission->is_read ? 'bg-blue-50/40' : '' }}">
                    <td class="px-4 py-3 text-gray-500">{{ $submission->created_at->format('d.m.Y H:i') }}</td>
                    <td class="px-4 py-3">{{ $submission->typeLabel() }}</td>
                    <td class="px-4 py-3 font-medium">{{ $submission->company ?? $submission->name ?? '—' }}</td>
                    <td class="px-4 py-3">{{ $submission->email }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.submissions.show', $submission) }}" class="text-[#0b1325] hover:underline">Открыть</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">Обращений пока нет</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $submissions->links() }}</div>
@endsection
