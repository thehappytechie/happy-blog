<div>
    <div class="bg-white px-5 py-5">
        <h2 class="text-2xl sm:text-2xl font-semibold font-display text-gray-700 tracking-tight mb-2">Add Category
        </h2>
        <form class="border-t border-gray-100" method="POST">
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-4 mb-2">
                <div>
                    <label for="name"
                        class="block text-sm font-medium leading-6 text-gray-600">Name
                        <span class="text-pink-600 text-xs">*</span></label>
                    <div class="mt-2">
                        <input type="text" id="name" wire:model="name"
                            wire:keyup.debounce.200ms="generateSlug" class="input__field">
                    </div>
                    @error('name')
                        <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
                <div>
                    <label for="slug"
                        class="block text-sm font-medium leading-6 text-gray-600">Slug</label>
                    <div class="mt-2" wire:ignore>
                        <input type="text" id="slug" wire:model="slug" class="input__field"
                            disabled>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button wire:click.prevent="save"
            class="inline-flex items-center gap-x-1.5 bg-orange-600 ml-4 px-3 py-1.5 text-sm bg-gradient-to-b text-orange-600 font-semibold from-slate-50 to-orange-100 rounded shadow-orange-500 shadow-sm border-b-4 hover border-orange-200 hover:shadow-sm transition-all duration-500">Save</button>
        <button wire:click.prevent="$emit('closeModal')"
            class="inline-flex items-center rounded-md bg-white px-3 py-1.5 text-xs font-semibold text-gray-800 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Close</button>
    </div>
</div>

