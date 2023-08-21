<div>
    <span class="inline-flex items-center text-sm mt-8">
        <button wire:click="like"
            class="inline-flex space-x-2 {{ $post->isLiked() ? 'animate-pulse text-red-600 hover:text-red-700' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0">
            <svg class="h-7 w-7" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M34 9c-4.2 0-7.9 2.1-10 5.4C21.9 11.1 18.2 9 14 9C7.4 9 2 14.4 2 21c0 11.9 22 24 22 24s22-12 22-24c0-6.6-5.4-12-12-12z" />
            </svg>
            <span class="font-medium text-gray-900 text-md mt-1">{{ $count }}</span>
            <span class="sr-only">likes</span>
        </button>
    </span>
</div>
