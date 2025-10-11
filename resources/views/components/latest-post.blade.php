<!-- resources/views/components/latest-posts.blade.php -->
<div>
    <h3 class="text-xl font-semibold text-green-700 mb-4">Latest Posts</h3>
    <ul class="space-y-4">
        @foreach ($posts as $post)
        <li class="flex gap-4">
            <img src="{{ $post['image'] ?? 'https://via.placeholder.com/100x80' }}"
                alt="{{ $post['title'] ?? 'Post Image' }}"
                class="rounded-md w-24 h-20 object-cover">
            <div>
                <p class="font-medium text-gray-800 leading-tight mb-1">
                    {{ $post['title'] }}
                </p>
                <p class="text-sm text-gray-500 flex items-center gap-1">
                    <i class="fa-solid fa-calendar text-green-700 text-xl"></i>

                    {{ $post['date'] }}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
</div>