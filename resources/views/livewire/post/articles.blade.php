<div class="relative mx-auto max-w-7xl px-6 pb-20 pt-12 lg:px-8 lg:pb-28 lg:pt-12">
    <div class="text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">All Posts</h2>
    </div>
    <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
        @forelse ($posts as $post)
        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="{{ url('storage/'.$post->feature_image.'') }}"
                    alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                    <p class="text-sm font-medium text-orange-600">
                        <a href="{{ route('category.show',$post->category->name) }}"
                            class="hover:underline">{{ ucfirst($post->category->name) }}</a>
                    </p>
                    <a href="{{ route('post.view',$post->slug) }}" class="mt-2 block">
                        <p class="text-xl font-semibold text-gray-900">{{ $post->title }}</p>
                        <p class="mt-3 text-base text-gray-500">@markdown($post->shortExcerpt())</p>
                    </a>
                </div>
                <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('post.author', $post->user->id) }}">
                            <span class="sr-only">{{ ucfirst($post->user->name) }}</span>
                            <img class="h-10 w-10 rounded-full"
                                src="https://api.dicebear.com/6.x/adventurer-neutral/svg?seed={{ ucfirst($post->user->name) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">
                            <a href="{{ route('post.author', $post->user->id) }}" class="hover:underline text-orange-600 underline">{{
                                ucfirst($post->user->name) }}</a>
                        </p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time datetime="{{ $post->created_at->toFormattedDateString() }}">{{
                                $post->created_at->toFormattedDateString() }}</time>
                            <span aria-hidden="true">&middot;</span>
                            <span>6 min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-lg font-medium text-gray-400">No posts available, write something great!
        </p>
        @endforelse
    </div>
</div>
