@extends('layouts.admin')
@section('title', 'Настройки сайта')
@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-8">
    @csrf
    @method('PUT')

    @foreach($settings as $group => $groupSettings)
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="font-bold text-[#0b1325] uppercase text-sm tracking-wider mb-4">{{ $group }}</h2>
            <div class="space-y-4">
                @foreach($groupSettings as $setting)
                    @if($setting->type === 'image')
                        <div>
                            <label class="block text-sm font-semibold text-[#0b1325] mb-1">{{ $setting->label }}</label>
                            <input type="file" name="settings[{{ $setting->key }}]" class="w-full text-sm">
                            @if($setting->value)
                                <img src="{{ asset('storage/'.$setting->value) }}" alt="" class="h-16 mt-2 rounded border">
                            @endif
                        </div>
                    @elseif($setting->type === 'textarea')
                        <x-admin.field :label="$setting->label" :name="'settings['.$setting->key.']'" type="textarea" :value="$setting->value" />
                    @else
                        <x-admin.field :label="$setting->label" :name="'settings['.$setting->key.']'" :value="$setting->value" />
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="submit" class="bg-[#e31e24] text-white text-xs font-bold uppercase px-6 py-3 rounded">Сохранить настройки</button>
</form>
@endsection
