<x-mail::message>
# {{ $submission->typeLabel() }}

**Имя / организация:** {{ $submission->company ?? $submission->name ?? '—' }}

@if($submission->unp)
**УНП:** {{ $submission->unp }}
@endif

**Email:** {{ $submission->email }}

@if($submission->phone)
**Телефон:** {{ $submission->phone }}
@endif

**Сообщение:**

{{ $submission->message }}

<x-mail::button :url="route('admin.submissions.show', $submission)">
Открыть в админ-панели
</x-mail::button>

</x-mail::message>
