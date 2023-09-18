<div>
    <div class="py-4 mb-8">

        <a href="{{ route('setting.index') }}"
            class="pb-4 inline-flex items-center gap-x-1.5 text-sm font-semibold text-orange-600 hover:text-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>Back to settings
        </a>

        <div class="grid grid-cols-2 gap-4">
            <div class="text-left">
                <x-page-heading pageHeading="Roles" />
            </div>
            <div class="mt-4 text-right">
                <button type="button" wire:click="$emit('openModal', 'add-role-modal')"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-orange-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                    <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Add role
                </button>
            </div>
        </div>

        <div class="mt-4 text-sm">
            @livewire('role-table')
        </div>


        <div class="grid grid-cols-2 gap-4 pt-10">
            <div class="text-left">
                <x-page-heading pageHeading="Permissions" />
            </div>
            <div class="mt-4 text-right">
                <button type="button" wire:click="$emit('openModal', 'add-permission-modal')"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-orange-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                    <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Add permission
                </button>
            </div>
        </div>


        <div class="mt-4 text-sm">
            @livewire('permission-table')
        </div>

    </div>

</div>
