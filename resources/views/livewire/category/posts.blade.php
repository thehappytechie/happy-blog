<div class="relative mx-auto max-w-7xl px-6 pb-10 pt-12 lg:px-8 lg:pb-10 lg:pt-12">
    <div class="bg-white py-4">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ ucfirst($category->name) }}
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.
                </p>
                @foreach ($category->posts as $post)
                <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
                    <article class="relative isolate flex flex-col gap-8 lg:flex-row">
                        <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                            <img src="{{ url('storage/'.$post->feature_image.'') }}" alt=""
                                class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                        <div>
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="{{ $post->created_at->toFormattedDateString() }}"
                                    class="text-gray-500">{{ $post->created_at->toFormattedDateString() }}</time>
                                <a href="#"
                                    class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{
                                    ucfirst($category->name) }}</a>
                            </div>
                            <div class="group relative max-w-xl">
                                <h3
                                    class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ route('post.view', $post->slug) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mt-5 text-sm leading-6 text-gray-600">@markdown($post->shortExcerpt())</p>
                            </div>
                            <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                                <div class="relative flex items-center gap-x-4">
                                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                    <div class="text-sm leading-6">
                                        <p class="font-semibold text-gray-900">
                                            <a href="{{ route('post.author',$post->user->id) }}">
                                                <span class="absolute inset-0"></span>
                                                {{ $post->user->name }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- More posts... -->
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
