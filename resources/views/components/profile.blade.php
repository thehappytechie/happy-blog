<div class="relative" x-data="{ open: false }">
    <button @click="open = ! open"> <span class="hidden lg:flex lg:items-center">
            <span class="sr-only">Open user menu</span>
            <img class="h-7 w-7 rounded-full bg-gray-50"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
            <span class="ml-4 text-sm font-medium leading-6 text-gray-900" aria-hidden="true">Tom Cook</span>
            <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </button>

    <div x-show="open" @click.outside="open = false"
        class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
        <a href="{{ route('user.update.profile') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1"
            id="user-menu-item-0">Your profile</a>
        <a href="{{ route('user.update.password') }}" class="divide-y divide-gray-100 block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
            tabindex="-1" id="user-menu-item-0">Your password</a>
        <div class="w-11/12 m-auto border-t border-gray-100"></div>
        <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1"
            id="user-menu-item-0">Settings</a>
        <div class="w-11/12 m-auto border-t border-gray-100"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="block px-3 py-1 text-sm leading-6 text-red-600" type="submit">Logout</button>
        </form>
    </div>
</div>
