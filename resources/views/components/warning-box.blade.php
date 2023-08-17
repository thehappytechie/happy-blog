<div class="rounded-md {{ $bgColor }} p-4 mt-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 {{ $iconColor }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="{{ $iconPath }}" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            {{ $slot }}
        </div>
    </div>
</div>
