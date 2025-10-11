<div
    class="lg:w-full w-full text-[6px] md:text-md lg:text-[15px] flex flex-wrap items-center gap-2 text-sm page-breadcrumb-content bg-white py-5 px-4 shadow-md shadow-green-200 rounded-md">

    @foreach ($breadcrumbs as $route => $label)
    @if (!$loop->last)
    <a href="{{ route($route) }}" class="text-black hover:text-green-700 font-medium transition">
        {{ $label }}
    </a>
    <span class="text-gray-400">&gt;</span>
    @else
    <span class="text-green-700 font-semibold">{{ $label }}</span>
    @endif
    @endforeach
</div>