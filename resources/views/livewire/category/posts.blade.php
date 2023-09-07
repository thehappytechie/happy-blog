<div class="relative mx-auto max-w-7xl px-6 pb-20 pt-12 lg:px-8 lg:pb-28 lg:pt-12">
    <div class="text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ ucfirst($category->name) }} Posts
        </h2>
    </div>

    <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
        @foreach ($category->posts as $post)
        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover"
                    src="{{ url('storage/'.$post->feature_image.'') }}"
                    alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                    <p class="text-sm font-medium text-indigo-600">
                        <a href="#" class="hover:underline">{{ ucfirst($category->name) }}</a>
                    </p>
                    <a href="{{ route('post.show', $post->slug) }}" class="mt-2 block">
                        <p class="text-xl font-semibold text-gray-900">{{ $post->title }}</p>
                        <p class="mt-3 text-base text-gray-500">@markdown($post->shortExcerpt())</p>
                    </a>
                </div>
                <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <a href="#">
                            <span class="sr-only">Roel Aufderehar</span>
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </a>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">
                            <a href="#" class="hover:underline">{{ $post->user->name }}</a>
                        </p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time datetime="2020-03-16">{{ $post->created_at->toFormattedDateString() }}</time>
                            <span aria-hidden="true">&middot;</span>
                            <span>6 min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
