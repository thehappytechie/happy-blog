<nav class="hidden space-x-10 md:flex">
    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Technology</a>
    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Laravel</a>
    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Tips</a>
    <a href="{{ route('post.all') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">All Articles</a>
    <div class="relative" x-data="{ open: false }">
        <button @click="open = ! open"> <span
                class="text-gray-500 group inline-flex items-center rounded-md bg-white text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
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
                class="divide-y divide-gray-100 block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem"
                tabindex="-1" id="user-menu-item-0">About</a>
            <div class="w-11/12 m-auto border-t border-gray-100"></div>
            <a href="#"
                class="divide-y divide-gray-100 block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem"
                tabindex="-1" id="user-menu-item-0">Contribute</a>
            <div class="w-11/12 m-auto border-t border-gray-100"></div>
            <a href="mailto:hello@thehappytechie.com" class="block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem" tabindex="-1"
                id="user-menu-item-0">Contact</a>
            <div class="w-11/12 m-auto border-t border-gray-100"></div>
            <a href="{{ route('login') }}" class="block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem"
                tabindex="-1" id="user-menu-item-0">Login</a>
        </div>
    </div>
</nav>
