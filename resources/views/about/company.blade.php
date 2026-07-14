@extends('layouts.app')
@section('title', $page->title)
@section('content')
<x-page-hero :title="$page->title" :breadcrumbs="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => 'О предприятии', 'url' => route('about.company')],
    ['label' => $page->title],
]" />
<x-page-content :page="$page" />
@endsection
