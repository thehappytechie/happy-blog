<label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-800">{{ $label }}</label>
<div class="mt-2">
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        class="input__field" required>
</div>
@error($name)
<x-validation-message>{{ $message }}</x-validation-message>
@enderror
