<li class="{{ Request::routeIs($route) ? 'active' : '' }}">
    <a href="{{ route($route) }}"
        class="group flex w-full items-center rounded-md py-1 pl-11 pr-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
        {{ $slot }}
    </a>
</li>
