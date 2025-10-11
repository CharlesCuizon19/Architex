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
'fallback_image' => 'img/about-us/page-header.png',
],
];

$breadcrumbs = [
'homepage' => 'Home',
'blogs' => 'Blogs',
];

$pageTitle = 'Blogs';
@endphp

<section>
    @include('components.banner', [
    'banner_type' => 'other',
    'heroes' => $heroes,
    'breadcrumbs' => $breadcrumbs,
    'pageTitle' => $pageTitle,
    ])
</section>

<section id="blogs" class="bg-[#e8e8e8] pt-20 pb-[20rem]">
    <div class="p-5 text-center">

    </div>
    <div class="max-w-screen-xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <x-blog-card
            image="img/properties/first.png"
            category="Materials"
            date="Jun 04, 2025"
            title="Steel Fabrication: Strength Behind Every Structure"
            link="{{ route('blog-single-page') }}" />

        <x-blog-card
            image="img/blogs/blog2.jpg"
            category="Architect"
            date="Mar 21, 2025"
            title="Smart Spaces: The Future of Modern Living"
            link="{{ route('blog-single-page') }}" />

        <x-blog-card
            image="img/blogs/blog3.jpg"
            category="Design"
            date="Feb 12, 2025"
            title="Designing Exteriors that Inspire Productivity"
            link="{{ route('blog-single-page') }}" />

        <x-blog-card
            image="img/blogs/blog3.jpg"
            category="Design"
            date="Feb 12, 2025"
            title="Designing Exteriors that Inspire Productivity"
            link="{{ route('blog-single-page') }}" />

        <x-blog-card
            image="img/blogs/blog3.jpg"
            category="Design"
            date="Feb 12, 2025"
            title="Designing Exteriors that Inspire Productivity"
            link="{{ route('blog-single-page') }}" />

        <x-blog-card
            image="img/blogs/blog3.jpg"
            category="Design"
            date="Feb 12, 2025"
            title="Designing Exteriors that Inspire Productivity"
            link="{{ route('blog-single-page') }}" />
    </div>
</section>


@endsection