<!-- Static sidebar for desktop -->
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
        </div>
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="-mx-2 space-y-1">
                <x-navigation-link route='dashboard'>
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" fill-opacity=".15"
                            d="M512 188c-99.3 0-192.7 38.7-263 109c-70.3 70.2-109 163.6-109 263c0 105.6 44.5 205.5 122.6 276h498.8A371.12 371.12 0 0 0 884 560c0-99.3-38.7-192.7-109-263c-70.2-70.3-163.6-109-263-109zm-30 44c0-4.4 3.6-8 8-8h44c4.4 0 8 3.6 8 8v80c0 4.4-3.6 8-8 8h-44c-4.4 0-8-3.6-8-8v-80zM270 582c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8v44zm90.7-204.4l-31.1 31.1a8.03 8.03 0 0 1-11.3 0l-56.6-56.6a8.03 8.03 0 0 1 0-11.3l31.1-31.1c3.1-3.1 8.2-3.1 11.3 0l56.6 56.6c3.1 3.1 3.1 8.2 0 11.3zm291.1 83.5l-84.5 84.5c5 18.7.2 39.4-14.5 54.1a55.95 55.95 0 0 1-79.2 0a55.95 55.95 0 0 1 0-79.2a55.87 55.87 0 0 1 54.1-14.5l84.5-84.5c3.1-3.1 8.2-3.1 11.3 0l28.3 28.3c3.1 3.1 3.1 8.2 0 11.3zm43-52.4l-31.1-31.1a8.03 8.03 0 0 1 0-11.3l56.6-56.6c3.1-3.1 8.2-3.1 11.3 0l31.1 31.1c3.1 3.1 3.1 8.2 0 11.3l-56.6 56.6a8.03 8.03 0 0 1-11.3 0zM846 538v44c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8z" />
                        <path fill="currentColor"
                            d="M623.5 421.5a8.03 8.03 0 0 0-11.3 0L527.7 506c-18.7-5-39.4-.2-54.1 14.5a55.95 55.95 0 0 0 0 79.2a55.95 55.95 0 0 0 79.2 0a55.87 55.87 0 0 0 14.5-54.1l84.5-84.5c3.1-3.1 3.1-8.2 0-11.3l-28.3-28.3zM490 320h44c4.4 0 8-3.6 8-8v-80c0-4.4-3.6-8-8-8h-44c-4.4 0-8 3.6-8 8v80c0 4.4 3.6 8 8 8z" />
                        <path fill="currentColor"
                            d="M924.8 385.6a446.7 446.7 0 0 0-96-142.4a446.7 446.7 0 0 0-142.4-96C631.1 123.8 572.5 112 512 112s-119.1 11.8-174.4 35.2a446.7 446.7 0 0 0-142.4 96a446.7 446.7 0 0 0-96 142.4C75.8 440.9 64 499.5 64 560c0 132.7 58.3 257.7 159.9 343.1l1.7 1.4c5.8 4.8 13.1 7.5 20.6 7.5h531.7c7.5 0 14.8-2.7 20.6-7.5l1.7-1.4C901.7 817.7 960 692.7 960 560c0-60.5-11.9-119.1-35.2-174.4zM761.4 836H262.6A371.12 371.12 0 0 1 140 560c0-99.4 38.7-192.8 109-263c70.3-70.3 163.7-109 263-109c99.4 0 192.8 38.7 263 109c70.3 70.3 109 163.7 109 263c0 105.6-44.5 205.5-122.6 276z" />
                        <path fill="currentColor"
                            d="m762.7 340.8l-31.1-31.1a8.03 8.03 0 0 0-11.3 0l-56.6 56.6a8.03 8.03 0 0 0 0 11.3l31.1 31.1c3.1 3.1 8.2 3.1 11.3 0l56.6-56.6c3.1-3.1 3.1-8.2 0-11.3zM750 538v44c0 4.4 3.6 8 8 8h80c4.4 0 8-3.6 8-8v-44c0-4.4-3.6-8-8-8h-80c-4.4 0-8 3.6-8 8zM304.1 309.7a8.03 8.03 0 0 0-11.3 0l-31.1 31.1a8.03 8.03 0 0 0 0 11.3l56.6 56.6c3.1 3.1 8.2 3.1 11.3 0l31.1-31.1c3.1-3.1 3.1-8.2 0-11.3l-56.6-56.6zM262 530h-80c-4.4 0-8 3.6-8 8v44c0 4.4 3.6 8 8 8h80c4.4 0 8-3.6 8-8v-44c0-4.4-3.6-8-8-8z" />
                    </svg> Dashboard
                </x-navigation-link>

                <x-navigation-submenu svg="<svg class='h-5 w-5 shrink-0' viewBox='0 0 1024 1024' xmlns='http://www.w3.org/2000/svg'>
                    <path fill='currentColor' fill-opacity='.15' d='M534 352V136H232v752h560V394H576a42 42 0 0 1-42-42zm-22 322c0 4.4-3.6 8-8 8H320c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h184c4.4 0 8 3.6 8 8v48zm200-184v48c0 4.4-3.6 8-8 8H320c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h384c4.4 0 8 3.6 8 8z'/>
                    <path fill='currentColor' d='M854.6 288.6L639.4 73.4c-6-6-14.1-9.4-22.6-9.4H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V311.3c0-8.5-3.4-16.7-9.4-22.7zM602 137.8L790.2 326H602V137.8zM792 888H232V136h302v216a42 42 0 0 0 42 42h216v494z'/>
                    <path fill='currentColor' d='M312 490v48c0 4.4 3.6 8 8 8h384c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H320c-4.4 0-8 3.6-8 8zm192 128H320c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z'/>
                </svg>" route='post.create' title="Posts">
                    <x-navigation-submenu-link route='post.create'>Create Post</x-navigation-submenu-link>
                    <x-navigation-submenu-link route='post.index'>All Posts</x-navigation-submenu-link>
                    <x-navigation-submenu-link route='user.posts'>My Posts</x-navigation-submenu-link>
                    <x-navigation-submenu-link route='category.index'>Categories</x-navigation-submenu-link>
                    <x-navigation-submenu-link route='tag.index'>Tags</x-navigation-submenu-link>
                </x-navigation-submenu>

                <x-navigation-link route='user.index'>
                    <svg class='h-5 w-5 shrink-0' viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'>
                        <g fill='currentColor'>
                            <path d='M136 108a52 52 0 1 1-52-52a52 52 0 0 1 52 52Z' opacity='.2' />
                            <path
                                d='M117.25 157.92a60 60 0 1 0-66.5 0a95.83 95.83 0 0 0-47.22 37.71a8 8 0 1 0 13.4 8.74a80 80 0 0 1 134.14 0a8 8 0 0 0 13.4-8.74a95.83 95.83 0 0 0-47.22-37.71ZM40 108a44 44 0 1 1 44 44a44.05 44.05 0 0 1-44-44Zm210.14 98.7a8 8 0 0 1-11.07-2.33A79.83 79.83 0 0 0 172 168a8 8 0 0 1 0-16a44 44 0 1 0-16.34-84.87a8 8 0 1 1-5.94-14.85a60 60 0 0 1 55.53 105.64a95.83 95.83 0 0 1 47.22 37.71a8 8 0 0 1-2.33 11.07Z' />
                        </g>
                    </svg> Users
                </x-navigation-link>

                <x-navigation-link route='blog.index'>
                    <svg class='h-5 w-5 shrink-0' viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                        <g fill="#000000">
                            <path d="M208 32v160H72a24 24 0 0 0-24 24V56a24 24 0 0 1 24-24Z" opacity=".2" />
                            <path
                                d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8Zm-8 160H72a31.82 31.82 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z" />
                        </g>
                    </svg> Blog
                </x-navigation-link>
            </ul>
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li class="mt-auto">
                    <a href="{{ route('setting.index') }}"
                        class="group -mx-2 flex gap-x-2 rounded-md p-2 text-base font-medium leading-6 text-gray-600 hover:bg-gray-50 hover:text-indigo-600">
                        <svg class='h-5 w-5 shrink-0' viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" fill-opacity=".15"
                                d="m859.3 569.7l.2.1c3.1-18.9 4.6-38.2 4.6-57.3c0-17.1-1.3-34.3-3.7-51.1c2.4 16.7 3.6 33.6 3.6 50.5c0 19.4-1.6 38.8-4.7 57.8zM99 398.1c-.5-.4-.9-.8-1.4-1.3c.7.7 1.4 1.4 2.2 2.1l65.5 55.9v-.1L99 398.1zm536.6-216h.1l-15.5-83.8c-.2-1-.4-1.9-.7-2.8c.1.5.3 1.1.4 1.6l15.7 85zm54 546.5l31.4-25.8l92.8 32.9c17-22.9 31.3-47.5 42.6-73.6l-74.7-63.9l6.6-40.1c2.5-15.1 3.8-30.6 3.8-46.1s-1.3-31-3.8-46.1l-6.5-39.9l74.7-63.9c-11.4-26-25.6-50.7-42.6-73.6l-92.8 32.9l-31.4-25.8c-23.9-19.6-50.6-35-79.3-45.8l-38.1-14.3l-17.9-97a377.5 377.5 0 0 0-85 0l-17.9 97.2l-37.9 14.3c-28.5 10.8-55 26.2-78.7 45.7l-31.4 25.9l-93.4-33.2c-17 22.9-31.3 47.5-42.6 73.6l75.5 64.5l-6.5 40c-2.5 14.9-3.7 30.2-3.7 45.5c0 15.2 1.3 30.6 3.7 45.5l6.5 40l-75.5 64.5c11.4 26 25.6 50.7 42.6 73.6l93.4-33.2l31.4 25.9c23.7 19.5 50.2 34.9 78.7 45.7l37.8 14.5l17.9 97.2c28.2 3.2 56.9 3.2 85 0l17.9-97l38.1-14.3c28.8-10.8 55.4-26.2 79.3-45.8zm-177.1-50.3c-30.5 0-59.2-7.8-84.3-21.5C373.3 627 336 568.9 336 502c0-97.2 78.8-176 176-176c66.9 0 125 37.3 154.8 92.2c13.7 25 21.5 53.7 21.5 84.3c0 97.1-78.7 175.8-175.8 175.8zM207.2 812.8c-5.5 1.9-11.2 2.3-16.6 1.2c5.7 1.2 11.7 1 17.5-1l81.4-29c-.1-.1-.3-.2-.4-.3l-81.9 29.1zm717.6-414.7l-65.5 56c0 .2.1.5.1.7l65.4-55.9c7.1-6.1 11.1-14.9 11.2-24c-.3 8.8-4.3 17.3-11.2 23.2z" />
                            <path fill="currentColor" fill-opacity=".15"
                                d="M935.8 646.6c.5 4.7 0 9.5-1.7 14.1l-.9 2.6a446.02 446.02 0 0 1-79.7 137.9l-1.8 2.1a32 32 0 0 1-35.1 9.5l-81.3-28.9a350 350 0 0 1-99.7 57.6l-15.7 85a32.05 32.05 0 0 1-25.8 25.7l-2.7.5a445.2 445.2 0 0 1-79.2 7.1h.3c26.7 0 53.4-2.4 79.4-7.1l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-84.9c36.2-13.6 69.6-32.9 99.6-57.5l81.2 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.5-87.4 79.6-137.7l.9-2.6c1.6-4.7 2.1-9.7 1.5-14.5z" />
                            <path fill="currentColor"
                                d="M688 502c0-30.3-7.7-58.9-21.2-83.8C637 363.3 578.9 326 512 326c-97.2 0-176 78.8-176 176c0 66.9 37.3 125 92.2 154.8c24.9 13.5 53.4 21.2 83.8 21.2c97.2 0 176-78.8 176-176zm-288 0c0-29.9 11.7-58 32.8-79.2C454 401.6 482.1 390 512 390c29.9 0 58 11.6 79.2 32.8A111.6 111.6 0 0 1 624 502c0 29.9-11.7 58-32.8 79.2A111.6 111.6 0 0 1 512 614c-29.9 0-58-11.7-79.2-32.8A111.6 111.6 0 0 1 400 502z" />
                            <path fill="currentColor"
                                d="M594.1 952.2a32.05 32.05 0 0 0 25.8-25.7l15.7-85a350 350 0 0 0 99.7-57.6l81.3 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.6-87.5 79.7-137.9l.9-2.6c1.7-4.6 2.2-9.4 1.7-14.1c-.9-7.9-4.7-15.4-11-20.9l-65.3-55.9l-.2-.1c3.1-19 4.7-38.4 4.7-57.8c0-16.9-1.2-33.9-3.6-50.5c-.3-2.2-.7-4.4-1-6.6c0-.2-.1-.5-.1-.7l65.5-56c6.9-5.9 10.9-14.4 11.2-23.2c.1-4-.5-8.1-1.9-12l-.9-2.6a443.74 443.74 0 0 0-79.7-137.9l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.3 28.9c-30-24.6-63.4-44-99.6-57.6h-.1l-15.7-85c-.1-.5-.2-1.1-.4-1.6a32.08 32.08 0 0 0-25.4-24.1l-2.7-.5c-52.1-9.4-106.9-9.4-159 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.4a351.86 351.86 0 0 0-99 57.4l-81.9-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a446.02 446.02 0 0 0-79.7 137.9l-.9 2.6a32.09 32.09 0 0 0 7.9 33.9c.5.4.9.9 1.4 1.3l66.3 56.6v.1c-3.1 18.8-4.6 37.9-4.6 57c0 19.2 1.5 38.4 4.6 57.1L99 625.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.4 44.9 96.9 79.7 137.9l1.8 2.1c4.9 5.7 11.4 9.4 18.5 10.7c5.4 1 11.1.7 16.6-1.2l81.9-29.1c.1.1.3.2.4.3c29.7 24.3 62.8 43.6 98.6 57.1l15.8 85.4a32.05 32.05 0 0 0 25.8 25.7l2.7.5c26.1 4.7 52.8 7.1 79.5 7.1h.3c26.6 0 53.3-2.4 79.2-7.1l2.7-.5zm-39.8-66.5a377.5 377.5 0 0 1-85 0l-17.9-97.2l-37.8-14.5c-28.5-10.8-55-26.2-78.7-45.7l-31.4-25.9l-93.4 33.2c-17-22.9-31.2-47.6-42.6-73.6l75.5-64.5l-6.5-40c-2.4-14.9-3.7-30.3-3.7-45.5c0-15.3 1.2-30.6 3.7-45.5l6.5-40l-75.5-64.5c11.3-26.1 25.6-50.7 42.6-73.6l93.4 33.2l31.4-25.9c23.7-19.5 50.2-34.9 78.7-45.7l37.9-14.3l17.9-97.2c28.1-3.2 56.8-3.2 85 0l17.9 97l38.1 14.3c28.7 10.8 55.4 26.2 79.3 45.8l31.4 25.8l92.8-32.9c17 22.9 31.2 47.6 42.6 73.6L781.8 426l6.5 39.9c2.5 15.1 3.8 30.6 3.8 46.1s-1.3 31-3.8 46.1l-6.6 40.1l74.7 63.9a370.03 370.03 0 0 1-42.6 73.6L721 702.8l-31.4 25.8c-23.9 19.6-50.5 35-79.3 45.8l-38.1 14.3l-17.9 97z" />
                        </svg>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
