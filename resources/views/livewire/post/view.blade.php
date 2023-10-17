<div class="relative mx-auto max-w-7xl px-6 pb-10 lg:px-8 lg:pb-12">
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

            hr {
                margin-top: 30px;

            }

            .contents h3 {
                margin: 20px 0 20px 0;
                font-size: 20px;
                font-weight: 600;
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
                quotes: "\201C" "\201D" "\2018" "\2019";
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

            .timeline-comment {
                font-family: 'Nunito Sans', sans-serif !important;
            }
        </style>

        <div class="bg-white px-6 lg:px-8">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-9 w-9 rounded-full"
                        src="https://api.dicebear.com/6.x/big-ears-neutral/svg?seed={{ $post->user->name }}"
                        alt="Avatar">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-gray-800 group-hover:text-gray-900">
                        {{ $post->user->name }}</p>
                    <p class="text-xs font-medium text-gray-800 group-hover:text-gray-700 mt-0.5 uppercase">
                        {{ $post->datePostFormat() }}</p>
                </div>
            </div>
            <div class="mx-auto max-w-2xl text-left">
                <span
                    class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-800 ring-1 ring-inset ring-gray-500">
                    <svg class="h-1.5 w-1.5 fill-gray-500" viewBox="0 0 6 6" aria-hidden="true">
                        <circle cx="3" cy="3" r="3" />
                    </svg>
                    <a href="{{ route('category.show', $post->category->slug) }}" class="uppercase">
                        {{ ucfirst($post->category->name) }}</a>
                </span></p>
                <h2 class="my-14 font-heading text-2xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                    {{ $post->title }}
                </h2>
            </div>
            <div class="relative aspect-[16/9] mt-8 mb-16 max-w-2xl m-auto">
                <img src="{{ url('storage/' . $post->feature_image . '') }}" alt=""
                    class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-800/10"></div>
            </div>

            <div class="text-gray-800 contents">
                <div class="max-w-2xl m-auto">
                    @markdown($post->contents)
                    <div class="flex justify-between py-2">
                        <div>
                            <div class="flex items-center gap-x-2 text-xs">
                                <livewire:like :post="$post" />
                                <div>
                                    <p class="inline-flex items-center text-sm mt-4">
                                        <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="ml-1">{{ $post->views }} views</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('category.show', $post->category->slug) }}"
                                class="pb-4 inline-flex items-center gap-x-1.5 text-sm text-orange-600 hover:text-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                                <svg class="-ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>Back to posts
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-2xl m-auto py-5 px-5">
                <div class="relative mb-4">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                </div>
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex gap-x-4 py-5">
                        <script src="https://utteranc.es/client.js" repo="thehappytechie/happy-blog" issue-term="pathname"
                            label="happy-blog-comments" theme="github-light" crossorigin="anonymous" async></script>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    @push('highlightJs')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
    @endpush

</div>
