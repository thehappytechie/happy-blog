<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body x-data="{ open: false }" x-cloak class="bg-gray-50">

    <x-alert></x-alert>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div x-data="{ open: false }" @keydown.window.escape="open = false" class="relative bg-gray-50">
        <div class="relative bg-white shadow">
            <div class="mx-auto max-w-7xl px-6">
                <x-public.desktop-navigation></x-public.desktop-navigation>
            </div>

            <x-public.mobile-navigation></x-public.mobile-navigation>

        </div>

        <main class="lg:relative">
            <div class="mx-auto w-full max-w-7xl pb-20 pt-16 text-center lg:py-48 lg:text-left">
                <div class="px-6 sm:px-8 lg:w-1/2 xl:pr-16">
                    <div class="hidden sm:mb-5 sm:flex sm:justify-center lg:justify-start">
                        @if ($popularFeaturedPost != 0)
                        <a href="{{ route('post.view',$popularFeaturedPost->slug) }}"
                            class="flex items-center rounded-full bg-black p-1 pr-2 text-white hover:text-gray-200 sm:text-base lg:text-sm xl:text-base">
                            <span
                                class="rounded-full bg-orange-500 px-3 py-0.5 text-sm font-semibold leading-5 text-white">Latest Post</span>
                            <span class="ml-4 text-sm">{{ $popularFeaturedPost->title }}</span>
                            <svg class="ml-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        @endif
                    </div>
                    <h1
                        class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                        <span class="block xl:inline font-heading">Thoughts & ideas</span>
                        <span class="block text-orange-600 xl:inline font-heading">around the things that matter</span>
                    </h1>
                    <p class="mx-auto mt-3 max-w-md text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">Stay up
                        to date with the latest trends and gain a competitive edge with our expert insights on
                        cybersecurity, web development, and more.</p>
                    <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('post.articles') }}"
                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-orange-600 px-8 py-3 text-base font-medium text-white hover:bg-orange-700 md:px-10 md:py-4 md:text-lg">All Posts</a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:ml-3 sm:mt-0">
                            <a href="{{ route('post.about') }}"
                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-orange-600 hover:bg-gray-50 md:px-10 md:py-4 md:text-lg">About
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative h-64 w-full sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:h-full lg:w-1/2">
                <img class="absolute inset-0 h-full w-full object-cover"
                    src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2102&q=80"
                    alt="">
            </div>
        </main>

        <div class="relative bg-white px-6 pb-20 pt-16 lg:px-8 lg:pb-28 lg:pt-24">
            <div class="absolute inset-0">
                <div class="h-1/3 bg-white sm:h-2/3"></div>
            </div>
            <div class="relative mx-auto max-w-7xl">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Recent posts</h2>
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
                                        <a href="{{ route('post.author', $post->user->id) }}" class="hover:underline">{{
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
        </div>

        <div class="bg-neutral-50 py-24 sm:py-32">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Popular</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Browse all the most read posts</p>
            </div>
            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-12 px-6 sm:gap-y-16 lg:grid-cols-2 lg:px-8">
                @if ($popularFeaturedPost != 0)
                <article class="mx-auto w-full max-w-2xl lg:mx-0 lg:max-w-lg">
                    <time datetime="{{ $popularFeaturedPost->created_at->toFormattedDateString() }}"
                        class="block text-sm leading-6 text-gray-600">
                        {{ $popularFeaturedPost->created_at->toFormattedDateString() }}
                    </time>
                    <h2 id="featured-post" class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $popularFeaturedPost->title }}
                    </h2>
                    <p class="mt-4 text-lg leading-8 text-gray-600">
                        @markdown($popularFeaturedPost->shortExcerpt())
                    </p>
                    <div
                        class="mt-4 flex flex-col justify-between gap-6 sm:mt-8 sm:flex-row-reverse sm:gap-8 lg:mt-4 lg:flex-col">
                        <div class="flex">
                            <a href="{{ route('post.view',$popularFeaturedPost->slug) }}"
                                class="text-sm font-semibold leading-6 text-orange-600"
                                aria-describedby="featured-post">
                                Continue reading <span aria-hidden="true">→</span>
                            </a>
                        </div>
                        <div class="flex lg:border-t lg:border-gray-900/10 lg:pt-8">
                            <a href="{{ route('post.author', $popularFeaturedPost->user->id) }}"
                                class="flex gap-x-2.5 text-sm font-semibold leading-6 text-gray-900">
                                <img src="https://api.dicebear.com/6.x/adventurer-neutral/svg?seed={{ ucfirst($popularFeaturedPost->user->name) }}"
                                    alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
                                {{ $popularFeaturedPost->user->name }}
                            </a>
                        </div>
                    </div>
                </article>
                @endif

                <div
                    class="mx-auto w-full max-w-2xl border-t border-gray-900/10 pt-12 sm:pt-16 lg:mx-0 lg:max-w-none lg:border-t-0 lg:pt-0">
                    <div class="-my-12 divide-y divide-gray-900/10">
                        @forelse ($featuredPosts as $featuredPost)
                        <article class="py-12">
                            <div class="group relative max-w-xl">
                                <time datetime="{{ $featuredPost->created_at->toFormattedDateString() }}"
                                    class="block text-sm leading-6 text-gray-600">{{
                                    $featuredPost->created_at->toFormattedDateString() }}</time>
                                <h2 class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ route('post.view',$featuredPost->slug) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $featuredPost->title }}
                                    </a>
                                </h2>
                                <p class="mt-4 text-sm leading-6 text-gray-600">@markdown($featuredPost->shortExcerpt())
                                </p>
                            </div>
                            <div class="mt-4 flex">
                                <a href="{{ route('post.author', $featuredPost->user->id) }}"
                                    class="relative flex gap-x-2.5 text-sm font-semibold leading-6 text-gray-900">
                                    <img src="https://api.dicebear.com/6.x/adventurer-neutral/svg?seed={{ ucfirst($featuredPost->user->name) }}"
                                        alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
                                    {{ $featuredPost->user->name }}
                                </a>
                            </div>
                        </article>
                        @empty
                        <p class="text-lg font-medium text-gray-400 mt-14">No posts available, write something
                            great!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white py-24 sm:py-24">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Explore</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Browse by category and we'll help you
                    find what you're looking for</p>
            </div>
            <div class="mx-auto w-7/12 px-6 lg:px-8">
                <fieldset>
                    <ul class="flex flex-wrap gap-3">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('category.show',$category->name) }}">
                                <span
                                    class="inline-flex items-center gap-x-1.5 rounded-full bg-orange-100 px-5 py-2 text-sm font-medium text-orange-600">
                                    {{ ucfirst($category->name) }}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </fieldset>
            </div>
        </div>

        <x-public.footer>

            </x-public.mobile-navigation>

    </div>

    @livewireScripts

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
