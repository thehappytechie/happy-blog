<div>
    <div class="py-4 mt-2">
        <button type="button"
            class="inline-flex items-center gap-x-1.5 py-1.5 text-sm font-medium text-blue-600 hover:text-blue-500">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <a href="{{ route('post.index') }}">Back to all posts</a>
        </button>
        <article class="relative isolate flex flex-col gap-8 lg:flex-row mt-6">
            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                <img src="{{ url('storage/'.$post->feature_image.'') }}" alt=""
                    class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
            </div>
            <div>
                <div class="flex items-center gap-x-4 text-xs">
                    <span
                        class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                        <svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                            <circle cx="3" cy="3" r="3" />
                        </svg>
                        <a href="http://"> {{ $post->published_at->toFormattedDateString() }}</a>
                    </span>
                    <span
                        class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                        <svg class="h-1.5 w-1.5 fill-yellow-500" viewBox="0 0 6 6" aria-hidden="true">
                            <circle cx="3" cy="3" r="3" />
                        </svg>
                        <a href="http://"> {{ ucfirst($post->category->name) }}</a>
                    </span>
                </div>
                <div class="group relative max-w-xl">
                    <h3 class="mt-3 text-2xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        {{ ucfirst($post->title) }}
                    </h3>
                    <p class="mt-5 text-sm leading-6 text-gray-600"> {!! $post->excerpt() !!} </p>
                </div>
                <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                    <div class="relative flex items-center gap-x-4">
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                            alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ ucfirst($post->user->name) }}
                                </a>
                            </p>
                            <p class="text-gray-600"> /{{ $post->user->username }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <div class="w-10/12 py-12">
            <div class="py-4">
                <h1 class="text-lg font-semibold leading-6 text-gray-900">Comments</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users opinions and views on the blog.</p>
            </div>
            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-blue-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                        <button type="button"
                            class="relative inline-flex items-center rounded-l-md bg-white px-3 py-2 text-blue-400 ring-1 ring-inset ring-blue-300 hover:bg-blue-50 focus:z-10">
                            <span class="sr-only">Edit</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                            </svg>
                        </button>
                        <button type="button"
                            class="relative inline-flex items-center bg-white px-3 py-2 text-blue-400 ring-1 ring-inset ring-blue-300 hover:bg-blue-50 focus:z-10">
                            <span class="sr-only">Attachment</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button type="button"
                            class="relative inline-flex items-center bg-white px-3 py-2 text-blue-400 ring-1 ring-inset ring-blue-300 hover:bg-blue-50 focus:z-10">
                            <span class="sr-only">Annotate</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 001.33 0l1.713-3.293a.783.783 0 01.642-.413 41.102 41.102 0 003.55-.414c1.437-.231 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zM6.75 6a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5zm0 2.5a.75.75 0 000 1.5h3.5a.75.75 0 000-1.5h-3.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button type="button"
                            class="relative inline-flex items-center rounded-r-md bg-white px-3 py-2 text-blue-400 ring-1 ring-inset ring-blue-300 hover:bg-blue-50 focus:z-10">
                            <span class="sr-only">Delete</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                </div>
            </div>

            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex gap-x-4 py-5">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="flex-auto">
                        <div class="flex items-baseline justify-between gap-x-4">
                            <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
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
                            <p class="text-sm font-semibold leading-6 text-gray-900">Michael Foster</p>
                            <p class="flex-none text-xs text-gray-600">
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
                <li class="flex gap-x-4 py-5">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="flex-auto">
                        <div class="flex items-baseline justify-between gap-x-4">
                            <p class="text-sm font-semibold leading-6 text-gray-900">Dries Vincent</p>
                            <p class="flex-none text-xs text-gray-600">
                                <time datetime="2023-03-03T13:23Z">2d ago</time>
                            </p>
                        </div>
                        <p class="mt-1 line-clamp-2 text-sm leading-6 text-gray-600">Quia animi harum in quis quidem
                            sint.
                            Ipsum
                            dolorem molestias veritatis quis eveniet commodi assumenda temporibus. Dicta ut modi alias
                            nisi.
                            Veniam quia velit et ut. Id quas ducimus reprehenderit veniam fugit amet fugiat ipsum eius.
                            Voluptas
                            nobis earum in in vel corporis nisi.</p>
                    </div>
                </li>
                <li class="flex gap-x-4 py-5">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="flex-auto">
                        <div class="flex items-baseline justify-between gap-x-4">
                            <p class="text-sm font-semibold leading-6 text-gray-900">Lindsay Walton</p>
                            <p class="flex-none text-xs text-gray-600">
                                <time datetime="2023-03-02T21:13Z">3d ago</time>
                            </p>
                        </div>
                        <p class="mt-1 line-clamp-2 text-sm leading-6 text-gray-600">Unde dolore exercitationem nobis
                            reprehenderit rerum corporis accusamus. Nemo suscipit temporibus quidem dolorum. Nobis optio
                            quae
                            atque blanditiis aspernatur doloribus sit accusamus. Sunt reiciendis ut corrupti ab debitis
                            dolorem
                            dolorem nam sit. Ducimus nisi qui earum aliquam. Est nam doloribus culpa illum.</p>
                    </div>
                </li>
            </ul>
        </div>

    </div>

</div>
