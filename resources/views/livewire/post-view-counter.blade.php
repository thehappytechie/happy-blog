<div>
    <div>
        <p>Views: {{ $post->views }}</p>
        <button wire:click="incrementViews" class="bg-blue-500 text-white py-2 px-4 rounded">
            Increment Views
        </button>
    </div>
</div>
