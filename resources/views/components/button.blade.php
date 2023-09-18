<button type="button" wire:click.prevent="{{ $action }}"
    class="mt-2 bg-gradient-to-b w-max mx-auto text-orange-600 font-semibold from-slate-50 to-orange-100 px-6 py-2 rounded shadow-orange-500 shadow-sm border-b-4 hover border-orange-200 hover:shadow-sm transition-all duration-500">
    {{ $slot }}
</button>
