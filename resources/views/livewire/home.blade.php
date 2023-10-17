<div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">Freshly Baked Blog Goodness !
            </h1>
            <p class="mt-2 mb-12 text-xl font-medium leading-8 text-gray-700">Reading our blog is like
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

<div class="bg-white pt-20">
    <div class="mx-auto max-w-7xl">
        <div
            class="relative isolate flex flex-col gap-10 overflow-hidden bg-gray-900 px-6 py-24 shadow-2xl sm:rounded-3xl sm:px-24 xl:flex-row xl:items-center xl:py-32">
            <h2 class="max-w-2xl text-2xl font-semibold tracking-tight text-white sm:text-4xl xl:max-w-none xl:flex-auto">
                Want blog news and updates?
                <p class="font-normal mt-2 text-3xl">Sign up for our newsletter.</p>
            </h2>
            <form class="w-full max-w-md">
                <div class="flex gap-x-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6"
                        placeholder="Enter your email">
                    <button type="submit"
                        class="flex-none rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Notify
                        me</button>
                </div>
                <p class="mt-4 text-sm leading-6 text-gray-300">We care about your data. Read our <a href="#"
                        class="font-semibold text-white">privacy&nbsp;policy</a>.</p>
            </form>
            <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2"
                aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                    fill-opacity="0.7" />
                <defs>
                    <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641" cx="0" cy="0"
                        r="1" gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(512 512) rotate(90) scale(512)">
                        <stop stop-color="#7775D6" />
                        <stop offset="1" stop-color="#E935C1" stop-opacity="0" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div>
</div>
