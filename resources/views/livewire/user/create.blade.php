<div>
    <div class="py-4 mt-2">

        <a href="{{ route('user.index') }}"
            class="pb-4 inline-flex items-center gap-x-1.5 text-sm font-semibold text-indigo-800 hover:text-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>Back to users
        </a>

        <x-page-heading pageHeading="Create User" />

        <form>
            <p class="text-xs text-gray-500"><span class="text-red-600 text-xs">*</span> indicates
                required field</p>
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
                        <p class="text-sm text-orange-700">An email with the account credentials is sent
                            to the user to change their password on first time login.</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8 mb-2">
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
                        class="inline-flex items-center gap-x-1 rounded-md border border-gray-600 px-2 py-1 text-xs text-gray-800 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg class="-ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        Generate
                    </button>
                </div>
            </div>
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-start">
                    <span class="bg-white pr-3 text-md font-medium leading-6 text-gray-900">Roles and
                        Permissions</span>
                </div>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
                <div>
                    <x-select name="role" label="Role">
                        <option value="">Select role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </x-select>
                    <div class="mt-2">
                        <button type="button" wire:click="$emit('openModal', 'add-role-modal')"
                            class="rounded-full bg-indigo-600 p-1 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="permission" class="block text-sm font-medium leading-6 text-gray-800">Permissions
                        <span class="text-pink-600 text-xs">*</span></label>
                    <div class="mt-2">
                        <select multiple x-data x-init="const tomselect = new TomSelect($refs.select, {
                            plugins: ['remove_button'],
                        });
                        tomselect.on('change', (value) => {
                            this.value = value;
                        });" wire:model="selectedPermissions" x-ref="select" x-cloak>
                            <option value="">Select permission</option>
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error($selectedPermissions)
                    <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
            </div>
            <div class="py-4">
                <x-button action="save"
                    class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create
                </x-button>
            </div>

        </form>

    </div>

</div>
