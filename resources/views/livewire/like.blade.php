<div>
    <span class="inline-flex items-center text-sm mt-4">
        <button wire:click="like"
            class="inline-flex space-x-2 {{ $post->isLiked() ? 'text-red-600 hover:text-red-700' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
              </svg>
            <span class="font-medium text-gray-900 text-md mt-1">{{ $count }}</span>
            <span class="sr-only">likes</span>
        </button>
    </span>
</div>
