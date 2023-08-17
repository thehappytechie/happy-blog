<div wire:ignore x-data x-init="FilePond.registerPlugin(FilePondPluginFileValidateType);
FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.setOptions({
    server: {
        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            @this.upload('feature_image', file, load, error, progress)
        },
        revert: (filename, load) => {
            @this.removeUpload('feature_image', filename, load)
        }
    },
    acceptedFileTypes: ['image/*'],
});
FilePond.create($refs.input);">

    <label class="block text-sm font-medium text-gray-800 mb-2">Featured image</label>
    <input wire:model="feature_image" type="file" x-ref="input">

</div>

