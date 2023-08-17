<li class="{{ Request::routeIs($route) ? 'active' : '' }}">
    <a href="{{ route($route) }}"
        class="hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-2 rounded-md p-2 text-gray-600 text-sm leading-6 font-semibold">
        {{ $slot }}
    </a>
</li>
