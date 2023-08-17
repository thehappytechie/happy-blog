<div>
    <label for="select-{{ $name }}" class="block text-sm font-medium leading-6 text-gray-800">{{ $label }}
        <span class="text-pink-600 text-xs">*</span></label>
    <div class="mt-2">
        <select x-data x-init="const tomselect = new TomSelect($refs.select, {
            plugins: ['remove_button'],
            maxItems: 1,
        });
        tomselect.on('change', (value) => {
            this.value = value;
        });" class="input__field @error($name) input__field--error @enderror" wire:model="{{ $name }}" wire:ignore
            x-ref="select" x-cloak>
            {{ $slot }}
        </select>
    </div>
    @error($name)
    <x-validation-message> {{ $message }} </x-validation-message>
    @enderror
</div>
