<div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
    <div class="flex h-16 shrink-0 items-center">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
            alt="Your Company">
    </div>
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="-mx-2 space-y-1">
            <x-navigation-link route='dashboard'>
                <svg class="h-5 w-5 shrink-0" viewBox="0 -960 960 960">
                    <path fill="currentColor"
                        d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
                </svg>
                Dashboard
            </x-navigation-link>

            <x-navigation-submenu
                svg="<svg class='h-5 w-5 shrink-0' viewBox='0 -960 960 960'><path fill='currentColor'
                d='M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z'/></svg>"
                route='post.create' title="Posts">
                <x-navigation-submenu-link route='post.create'>Create Post</x-navigation-submenu-link>
                <x-navigation-submenu-link route='post.index'>All Posts</x-navigation-submenu-link>
                <x-navigation-submenu-link route='user.posts'>My Posts</x-navigation-submenu-link>
                <x-navigation-submenu-link route='category.index'>Categories</x-navigation-submenu-link>
                <x-navigation-submenu-link route='tag.index'>Tags</x-navigation-submenu-link>
            </x-navigation-submenu>

            <x-navigation-link route='user.index'>
                <svg class='h-5 w-5 shrink-0' viewBox="0 -960 960 960">
                    <path fill='currentColor'
                        d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
                </svg>
                Users
            </x-navigation-link>

            <x-navigation-link route='blog.index'>
                <svg class='h-5 w-5 shrink-0' viewBox="0 -960 960 960">
                    <path fill="currentColor"
                        d="M240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v160h-80v-120H520v-200H240v640h240v80H240Zm0-80v-640 640Zm492-219 43 43-155 154v42h42l155-154 42 42L687-80H560v-127l172-172Zm127 127L732-379l58-58q11-11 28-11t28 11l71 71q11 11 11 28t-11 28l-58 58Z" />
                </svg>
                Blog
            </x-navigation-link>
        </ul>
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li class="mt-auto">
                <a href="{{ route('setting.index') }}"
                    class="group -mx-2 flex gap-x-2 rounded-md p-2 text-base font-medium leading-6 text-gray-600 hover:bg-gray-50 hover:text-indigo-600">
                    <svg class='h-5 w-5 shrink-0' viewBox="0 -960 960 960">
                        <path fill="currentColor"
                            d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm112-260q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm0-80q-25 0-42.5-17.5T422-480q0-25 17.5-42.5T482-540q25 0 42.5 17.5T542-480q0 25-17.5 42.5T482-420Zm-2-60Zm-40 320h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Z" />
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
    </nav>
</div>
