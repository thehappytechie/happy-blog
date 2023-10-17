<style>
    @font-face {
        font-family: "Rocher";
        src: url("{{ asset('fonts/RocherColorGX.woff2') }}");
        font-display: swap;
    }
</style>

<div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl" style="font-family:'Rocher'">Freshly Baked Blog Goodness !
            </h1>
            <p class="mt-2 mb-12 text-xl leading-8 text-gray-600">Reading our blog is like
                taking a detour through the
                world of hilarious travel mishaps and misadventures
            </p>
            <hr>
            <ul role="list" class="mt-8 space-y-6">
                @foreach ($posts as $post)
                    <li class="relative flex gap-x-4">
                        <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                            <div class="w-px bg-gray-200"></div>
                        </div>
                        <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                            <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                        </div>
                        <article class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="{{ $post->datePostFormat() }}"
                                    class="text-gray-500">{{ $post->datePostFormat() }}</time>
                                <a href="{{ route('category.show', $post->category->slug) }}"
                                    class="relative z-10 rounded-full border border-gray-400 bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</a>
                            </div>
                            <div class="group relative">
                                <h3
                                    class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ route('post.view', $post->slug) }}"
                                        wire:click.defer="incrementViewCount('{{ $post->id }}')">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                    {{ $post->excerpt() }}</p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
