<div class="p-3">

    <div class="py-2">
        @if($categoryId)
        CategoryId: {{ $categoryId }}
        @endif
        @if($categoryIds)
        CategoryIdIds: @json($categoryIds)
        @endif
        <div class="space-x-2 flex justify-end mt-3">
            <button class="bg-gray-200 cursor-pointer text-black border border-gray-400 px-3 py-2 m-1 rounded text-sm"
                wire:click.prevent="$emit('closeModal')">
                Cancel
            </button>
            <button class="bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm" wire:click="confirm">
                Confirm
            </button>
        </div>
    </div>

</div>
