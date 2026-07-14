@props(['label', 'name', 'type' => 'text', 'value' => '', 'required' => false, 'rows' => 6, 'options' => []])

<div>
    <label class="block text-sm font-semibold text-[#0b1325] mb-1">{{ $label }}@if($required) *@endif</label>

    @if($type === 'textarea')
        <textarea name="{{ $name }}" rows="{{ $rows }}" @if($required) required @endif class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325] font-mono text-sm">{{ old($name, $value) }}</textarea>
    @elseif($type === 'select')
        <select name="{{ $name }}" @if($required) required @endif class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
            @foreach($options as $optValue => $optLabel)
                <option value="{{ $optValue }}" @selected(old($name, $value) == $optValue)>{{ $optLabel }}</option>
            @endforeach
        </select>
    @elseif($type === 'checkbox')
        <label class="flex items-center gap-2">
            <input type="hidden" name="{{ $name }}" value="0">
            <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $value)) class="rounded">
            <span class="text-sm text-gray-600">Опубликовано</span>
        </label>
    @elseif($type === 'file')
        <input type="file" name="{{ $name }}" @if($required) required @endif class="w-full text-sm">
        @if($value)
            <p class="text-xs text-gray-500 mt-1">Текущий файл загружен</p>
        @endif
    @elseif($type === 'wysiwyg')
        <input type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
        <trix-editor input="{{ $name }}" class="trix-content bg-white border border-gray-300 rounded min-h-[200px]"></trix-editor>
        <p class="text-xs text-gray-400 mt-1">Визуальный редактор — поддерживается форматирование текста</p>
    @elseif($type === 'html')
        <textarea name="{{ $name }}" rows="{{ $rows }}" class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325] font-mono text-sm">{{ old($name, $value) }}</textarea>
        <p class="text-xs text-gray-400 mt-1">Поддерживается HTML-разметка</p>
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" @if($required) required @endif class="w-full border border-gray-300 rounded px-4 py-2.5 focus:outline-none focus:border-[#0b1325]">
    @endif

    @error($name)
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
