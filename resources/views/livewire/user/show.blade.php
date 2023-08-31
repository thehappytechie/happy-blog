<div class="md:w-9/12 w-full">
    <div class="py-4 mt-2">
        <a href="{{ route('user.index') }}"
            class="pb-4 inline-flex items-center gap-x-1.5 text-sm font-semibold text-indigo-800 hover:text-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>Back to users
        </a>

        <x-page-heading pageHeading="{{ $user->name }}" />
        <div x-data="{ tab: 'first' }">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a :class="{ 'border-indigo-500 text-indigo-600': tab === 'first' }"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-md text-gray-900" href="#"
                        @click.prevent="tab = 'first'">
                        Manage profile
                    </a>

                    <a :class="{ 'border-indigo-500 text-indigo-600': tab === 'second' }"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-md text-gray-900" href="#"
                        @click.prevent="tab = 'second'"> Posts
                        <span
                            class="bg-gray-100 text-gray-900 ml-3 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block">{{
                            $posts->count() }}</span>
                    </a>
                </nav>
            </div>

            <div x-show="tab === 'first'" class="mt-6">

                <form>
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
                            <x-select name="selectedRole" label="Role">
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $role->name == $selectedRole ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
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
                            <label for="permission"
                                class="block text-sm font-medium leading-6 text-gray-800">Permissions
                                <span class="text-pink-600 text-xs">*</span></label>
                            <div class="mt-2">
                                <select multiple x-data x-init="const tomselect = new TomSelect($refs.select, {
                            plugins: ['remove_button'],
                        });
                        tomselect.on('change', (value) => {
                            this.value = value;
                        });" wire:model="selectedPermissions" x-ref="select" x-cloak>
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}" {{ in_array($permission->name,
                                        $selectedPermissions)
                                        ? 'selected' : '' }}>
                                        {{ ucfirst($permission->name) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <x-button action="save"
                            class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save changes
                        </x-button>
                    </div>
                </form>
            </div>

            <div x-show="tab === 'second'" class="mt-6">
                <p>
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($posts as $post )
                    <li class="flex items-center justify-between gap-x-6 py-5">
                        <div class="min-w-0">
                            <div class="flex items-start gap-x-3">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $post->title }}</p>
                                <p
                                    class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                    {{ $post->category->name }}</p>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                <p class="whitespace-nowrap">Created on <time datetime="2023-03-17T00:00Z">{{
                                        $post->created_at->toFormattedDateString() }}</time></p>
                                <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <p class="truncate">Created by {{ $post->user->name }}</p>
                            </div>
                        </div>
                        <div class="flex flex-none items-center gap-x-4">
                            <a href="{{ route('post.show', $post->id) }}"
                                class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View
                                post<span class="sr-only">Post</span></a>
                            <div class="relative flex-none" x-data="{ open: false }">
                                <button @click="open = ! open" type="button"
                                    class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900"
                                    id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.outside="open = false"
                                    class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-50", Not Active: "" -->
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                        tabindex="-1" id="options-menu-0-item-0">Edit<span
                                            class="sr-only">Post</span></a>
                                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                        tabindex="-1" id="options-menu-0-item-2">Delete<span
                                            class="sr-only">Post</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                </p>
            </div>
        </div>

    </div>
</div>
