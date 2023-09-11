<div class="flex items-center justify-between py-6 md:justify-start md:space-x-10">
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
        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Technology</a>
        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Laravel</a>
        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Tips</a>
        <a href="{{ route('post.articles') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">All
            Articles</a>
        <div class="relative" x-data="{ open: false }">
            <button @click="open = ! open"> <span
                    class="text-gray-500 group inline-flex items-center rounded-md bg-white text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    <span>More</span>
                    <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <div x-show="open" @click.outside="open = false"
                class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-800/5 focus:outline-none">
                <a href="{{ route('post.about') }}"
                    class="divide-y divide-gray-100 block px-3 py-1 text-sm leading-6 text-gray-800 hover:text-orange-600"
                    role="menuitem" tabindex="-1" id="user-menu-item-0">About</a>
                <div class="w-11/12 m-auto border-t border-gray-100"></div>
                <a href="#"
                    class="divide-y divide-gray-100 block px-3 py-1 text-sm leading-6 text-gray-800 hover:text-orange-600"
                    role="menuitem" tabindex="-1" id="user-menu-item-0">Contribute</a>
                <div class="w-11/12 m-auto border-t border-gray-100"></div>
                <a href="mailto:hello@thehappytechie.com"
                    class="block px-3 py-1 text-sm leading-6 text-gray-800 hover:text-orange-600" role="menuitem"
                    tabindex="-1" id="user-menu-item-0">Contact</a>
                <div class="w-11/12 m-auto border-t border-gray-100"></div>
                <a href="{{ route('login') }}" target="_blank"
                    class="block px-3 py-1 text-sm leading-6 text-gray-800 hover:text-orange-600" role="menuitem"
                    tabindex="-1" id="user-menu-item-0">Login</a>
            </div>
        </div>
    </nav>


    <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
        <a href="#"
            class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-orange-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-orange-700">Sign
            up</a>
    </div>
</div>
