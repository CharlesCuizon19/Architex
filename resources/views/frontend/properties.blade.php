@extends('layouts.guest')

@section('content')
@php
// Example heroes data (you can make this dynamic too)
$heroes = [
[
'title' => '',
'description' => '',
'button_text' => '',
'button_link' => '#',
'video' => '',
'fallback_image' => 'img/properties/page-header.png',
],
];

$breadcrumbs = [
'homepage' => 'Home',
'properties' => 'Properties',
];

$pageTitle = 'Properties';
@endphp

<section>
    @include('components.banner', [
    'banner_type' => 'other',
    'heroes' => $heroes,
    'breadcrumbs' => $breadcrumbs,
    'pageTitle' => $pageTitle,
    ])
</section>

<section>
    <x-properties-card
        :images="[
        [
            'src' => 'img/properties/first.png',
            'title' => 'Apo Yama Residences',
            'link' => route('properties-single-page', ['id' => 1]),
        ],
        [
            'src' => 'img/properties/second.png',
            'title' => 'Luna Ville Subdivision',
            'link' => route('properties-single-page', ['id' => 2]),
        ],
        [
            'src' => 'img/properties/third.png',
            'title' => 'Hillcrest Estates',
            'link' => route('properties-single-page', ['id' => 3]),
        ],
        [
            'src' => 'img/properties/fourth.png',
            'title' => 'Coming Soon...',
            'link' => route('properties-single-page', ['id' => 4]),
        ],
    ]" />


</section>

@endsection