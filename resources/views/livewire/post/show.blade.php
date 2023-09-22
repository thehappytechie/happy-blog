<div>

    <style>
        .contents strong {
            font-weight: 500 !important;
        }

        .contents a {
            text-decoration: underline
        }

        .contents a:hover {
            text-decoration: none
        }

        .contents p {
            margin: 20px 0 20px 0;
        }

        .contents ol {
            list-style: disc;
            list-style-position: outside;
            margin: 20px 50px 20px 50px;
        }

        .contents ul {
            list-style: decimal;
            list-style-position: outside;
            margin: 20px 50px 20px 50px;
        }

        .contents img {
            margin: 50px 0 50px 0;
        }

        blockquote {
            border-left: 5px solid#000;
            border-radius: 2px;
            background-color: #f3f3f3;
            margin: 1.5em 5px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }

        blockquote:before {
            color: #000;
            content: open-quote;
            font-size: 3em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }

        blockquote p {
            display: inline;
        }

        code {
            background: #f0f2f1;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .125);
            font-family: Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
            padding: .25rem .5rem;
            font-size: .875rem;
            border-radius: .25rem;
            word-break: break-word;
        }
    </style>

    <div class="py-4 mb-8">
        <button type="button"
            class="inline-flex items-center gap-x-1.5 py-1.5 text-sm font-medium text-blue-600 hover:text-blue-500">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <a href="{{ route('post.index') }}">Back to all posts</a>
        </button>

        <div class="mt-8">
            <time datetime="{{ $post->datePostPublished() }}"
                class="order-first flex items-center text-sm text-zinc-500 dark:text-zinc-500"><span
                    class="h-4 w-0.5 rounded-full bg-zinc-300 dark:bg-zinc-600"></span><span class="ml-3">
                    {{ $post->datePostPublished() }}</span></time>
        </div>

        <div class="bg-white px-6 py-10 sm:py-8 lg:px-8">
            <div class="mx-auto max-w-2xl text-left">
                <span
                    class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-800 ring-1 ring-inset ring-gray-200">
                    <svg class="h-1.5 w-1.5 fill-yellow-500" viewBox="0 0 6 6" aria-hidden="true">
                        <circle cx="3" cy="3" r="3" />
                    </svg>
                    <a href="http://" class="uppercase"> {{ ucfirst($post->category->name) }}</a>
                </span></p>
                <h2 class="my-14 text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl font-heading"> {{
                    $post->title }}</h2>
            </div>
            <div class="relative aspect-[16/9] mt-8 max-w-2xl m-auto">
                <img src="{{ url('storage/'.$post->feature_image.'') }}" alt=""
                    class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-800/10"></div>
            </div>
            <div class="py-10">
                <a href="#" class="group block flex-shrink-0">
                    <div class="flex items-center">
                        <div>
                            <img class="inline-block h-9 w-9 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-gray-800 group-hover:text-gray-900">
                                {{ $post->user->name }}</p>
                            <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">View profile</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="text-gray-800 contents">
                @markdown($post->contents)
            </div>
            <div class="flex items-center gap-x-4 text-xs">
                <livewire:like :post="$post" />
                <div>
                    <p class="inline-flex items-center text-sm mt-4">
                        <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-1">{{ $post->views }} views</span>
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-200 mt-4">
            </div>
        </div>

        <div class="md:w-9/12 w-full py-5 px-5 shadow-lg border-b rounded-sm border-orange-500">
            <div class="relative mb-4">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-start">
                    <span class="bg-white pr-3 text-base font-semibold leading-6 text-gray-900">Comments</span>
                </div>
            </div>
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex gap-x-4 py-5">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="flex-auto">
                        <div class="flex items-baseline justify-between gap-x-4">
                            <p class="text-sm font-semibold leading-6 text-gray-800">Leslie Alexander</p>
                            <p class="flex-none text-xs text-gray-600">
                                <time datetime="2023-03-04T15:54Z">1d ago</time>
                            </p>
                        </div>
                        <p class="mt-1 line-clamp-2 text-sm leading-6 text-gray-600">Explicabo nihil laborum. Saepe
                            facilis
                            consequuntur in eaque. Consequatur perspiciatis quam. Sed est illo quia. Culpa vitae placeat
                            vitae.
                            Repudiandae sunt exercitationem nihil nisi facilis placeat minima eveniet.</p>
                    </div>
                </li>
                <li class="flex gap-x-4 py-5">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="flex-auto">
                        <div class="flex items-baseline justify-between gap-x-4">
                            <p class="text-sm font-semibold leading-6 text-gray-700">Michael Foster</p>
                            <p class="flex-none text-xs text-gray-500">
                                <time datetime="2023-03-03T14:02Z">2d ago</time>
                            </p>
                        </div>
                        <p class="mt-1 line-clamp-2 text-sm leading-6 text-gray-600">Laudantium quidem non et saepe vel
                            sequi
                            accusamus consequatur et. Saepe inventore veniam incidunt cumque et laborum nemo blanditiis
                            rerum. A
                            unde et molestiae autem ad. Architecto dolor ex accusantium maxime cumque laudantium itaque
                            aut
                            perferendis.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://utteranc.es/client.js" repo="thehappytechie/happy-blog" issue-term="pathname"
        label="happy-blog-comments" theme="github-light" crossorigin="anonymous" async>
    </script>

</div>

@push('highlightJs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>
@endpush
