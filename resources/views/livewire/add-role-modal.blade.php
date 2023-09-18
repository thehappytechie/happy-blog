<div>
    <div class="bg-white px-5 py-5">
        <h2 class="text-2xl sm:text-2xl font-semibold font-display text-gray-600 mb-2">Add Role
        </h2>
        <form class="border-t border-gray-100" method="POST">
            <div class="grid gap-5 mt-4 mb-2">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-700">Name
                        <span class="text-pink-700 text-xs">*</span></label>
                    <div class="mt-2">
                        <input type="text" id="name" wire:model="name" class="input__field">
                    </div>
                    @error('name')
                    <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
            </div>
        </form>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button wire:click.prevent="save"
            class="inline-flex items-center gap-x-1.5 rounded-md bg-orange-700 ml-4 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-700">Save</button>
        <button wire:click.prevent="$emit('closeModal')"
            class="inline-flex items-center rounded-md bg-white px-5 py-2 text-xs font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Close</button>
    </div>
</div>
