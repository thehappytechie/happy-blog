 <div>
    <div class="bg-white px-5 py-5">
        <h2 class="text-2xl sm:text-2xl font-semibold font-display text-gray-700 mb-2">Add Author
        </h2>
        <form class="border-t border-gray-100" method="POST">
            <div class="rounded-md bg-orange-100 p-4 my-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-orange-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-sm text-orange-700">Email with credentials is sent
                            to the user and they must change their password on first time login.</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-4 mb-2">
                <div>
                    <x-input-field type="name" name="name" label="Full name" />
                </div>
                <div>
                    <x-input-field type="email" name="email" label="Email" />
                </div>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-4 mb-2">
                <div>
                    <x-input-field type="text" name="password" label="Password" />
                </div>
                <div>
                    <x-input-field type="text" name="password_confirmation" label="Confirm password" />
                </div>
                <div>
                    <button type="button" wire:click="generatePassword"
                        class="inline-flex items-center gap-x-1 rounded-md border border-gray-600 px-2 py-1 text-xs text-gray-800 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                        <svg class="-ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        Generate
                    </button>
                </div>
            </div>
            <div class="flex items-center my-6">
                <input id="disable_login" type="checkbox" wire:model="disable_login"
                    class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500">
                <label for="disable_login" class="ml-2 block text-sm text-gray-500">Disable login</label>
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
