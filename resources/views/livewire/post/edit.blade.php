<div class="py-4 mt-2">
    <button type="button"
        class="inline-flex items-center gap-x-1.5 py-1.5 text-sm font-medium text-blue-600 hover:text-blue-500">
        <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <a href="{{ route('post.index') }}">Back to all posts</a>
    </button>

    <x-page-heading pageHeading="Edit Post" />

    <style>
        .filepond--credits {
            display: none;
        }
    </style>

    <form>
        <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-6">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input type="text" id="title" wire:model="title" wire:keyup.debounce.800ms="generateSlug"
                        class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('title')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                <div class="mt-2">
                    <input type="text" id="slug" wire:model="slug"
                        class="outline-none bg-gray-50 block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        disabled>
                </div>
            </div>
        </div>
        <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Author</label>
                <div class="mt-2">
                    <input type="text" name="email" id="email"
                        class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                <div class="mt-2">
                    <input type="text" name="email" id="email"
                        class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Published
                    date</label>
                <div class="mt-2">
                    <input type="text" name="email" id="email"
                        class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                <div class="mt-2">
                    <input type="text" name="email" id="email"
                        class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>

        <div class="overflow-auto mt-8">
            <div wire:ignore x-data x-init="FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginImagePreview);

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
                    },
                  } @endif
            });">
                <label class="block text-sm font-medium text-gray-600 mb-2">Profile Photo</label>
                <input wire:model="feature_image" accept="image/png, image/jpeg" type="file" x-ref="input">
            </div>
        </div>

        <div class="py-4">
            <button type="button" wire:click.prevent="save"
                class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publish</button>
        </div>

    </form>

</div>
