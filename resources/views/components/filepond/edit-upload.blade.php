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
FilePond.create($refs.input, {
    @if ($post->feature_image) files: [{
        source: '{{ Storage::url($post->feature_image) }}',
        options: {
            type: 'local'
          },
    }],
    server: {
        load: (uniqueFileId, load) => {
          fetch(uniqueFileId)
            .then(res => res.blob())
            .then(load);
        },
        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            @this.upload('feature_image', file, load, error, progress)
        },
        revert: (filename, load) => {
            @this.removeUpload('feature_image', filename, load)
        }
      },
    @endif
});" FilePond.create($refs.input);>
