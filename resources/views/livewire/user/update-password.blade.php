<div class="py-4 mt-2">

    <x-page-heading pageHeading="Update Password" />

    <form>
        <p class="mt-1 text-sm leading-6 text-gray-600">Manage your account password</p>
        <div class="rounded-md bg-orange-100 p-4 mt-4 md:w-9/12">
            <input type="hidden" wire:model="user_id">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-orange-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 flex-1 md:flex md:justify-between">
                    <p class="text-sm text-orange-700">Password must be at least 8 characters with combination of
                        uppercase letters, lowercase letters, numbers, and symbols.</p>
                </div>
            </div>
        </div>

        <div class="md:w-6/12">
            <div class="mt-6">
                <label for="current_password" class="block text-sm font-medium leading-6 text-gray-800">Current password</label>
                <div class="mt-2">
                    <input type="password" id="current_password" wire:model="current_password" autocomplete="current-password"
                        class="input__field" required>
                </div>
                @error('current_password')
                <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-800">New password</label>
                <div class="mt-2">
                    <input type="password" id="password" wire:model="password" autocomplete="new-password"
                        class="input__field" required>
                </div>
                @error('password')
                <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-800">Confirm assword</label>
                <div class="mt-2">
                    <input type="password" id="password_confirmation" wire:model="password_confirmation" autocomplete="current-password"
                        class="input__field" required>
                </div>
                @error('password')
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
