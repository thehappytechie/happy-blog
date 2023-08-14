<div class="py-4 mt-2">

    <x-page-heading pageHeading="Profile" />

    <form>
        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what
            you share.</p>
        <div class="md:w-6/12">
            <div class="mt-4">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full name
                    <span class="text-pink-600 text-xs">*</span></label>
                <div class="mt-2">
                    <input type="text" id="name" wire:model="name"
                        class="input__field @error('title') input__field--error @enderror">
                </div>
                @error('name')
                <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                    <span class="text-pink-600 text-xs">*</span></label>
                <div class="mt-2">
                    <input type="email" id="email" wire:model="email"
                        class="input__field @error('title') input__field--error @enderror">
                </div>
                @error('email')
                <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
        </div>

        <div class="py-4">
            <button type="button" wire:click.prevent="save"
                class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save changes
            </button>
        </div>
    </form>

</div>
