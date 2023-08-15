<div>
    <div class="py-4 mt-2">
        <div class="grid grid-cols-2 gap-4">
            <div class="text-left">
                <x-page-heading pageHeading="Categories" />
            </div>
            <div class="mt-4 text-right">
                <button type="button" wire:click="$emit('openModal', 'add-category-modal')"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Add category
                </button>
            </div>
        </div>

        <div class="mt-4 text-sm">
            @livewire('category-table')
        </div>

        <script>
            window.addEventListener('showAlert', event => {
                alert(event.detail.message);
            })
        </script>

    </div>

</div>
