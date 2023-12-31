<div x-show="open" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    class="absolute inset-x-0 top-0 z-10 origin-top-right transform p-2 transition md:hidden"
    x-description="Mobile menu, show/hide based on mobile menu state.">
    <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="px-5 pb-6 pt-5">
            <div class="flex items-center justify-between">
                <div>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=orange&shade=600"
                        alt="Your Company">
                </div>
                <div class="-mr-2">
                    <button type="button" @click="open = false"
                        class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-6">
                <nav class="grid gap-y-4">
                    <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">Home</a>
                    <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-500">Blog</a>
                </nav>
            </div>
        </div>
    </div>
</div>
