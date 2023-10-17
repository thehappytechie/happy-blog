<div class="flex items-center justify-between py-6 md:justify-start md:space-x-10 shadow-b-md">
    <div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="{{ route('home') }}">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/mark.svg?color=orange&shade=600"
                alt="">
        </a>
    </div>
    <div class="-my-2 -mr-2 md:hidden">
        <button type="button" @click="open = ! open"
            class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500"
            aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <nav class="hidden space-x-10 md:flex">
        <a href="{{ route('home') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Blog</a>
        <a href="{{ route('post.about') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">About</a>
    </nav>

    <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
    </div>
</div>
