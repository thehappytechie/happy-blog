<div class="py-4 px-8">
    <x-page-heading pageHeading="Create Post" />

    <style>
        .filepond--credits {
            display: none;
        }
    </style>

    <form>
        <p class="text-xs text-gray-500"><span class="text-red-600 text-xs">*</span> indicates required
            field</p>
        <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title <sup
                        class="text-red-600 text-xs">*</sup></label>
                <div class="mt-2">
                    <input type="text" id="title" wire:model="title" wire:keyup.debounce.800ms="generateSlug"
                        class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        required>
                </div>
                @error('title')
                    <p class="
                    ">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                <div class="mt-2" wire:ignore>
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
                <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900">Published
                    date</label>
                <div class="mt-2">
                    <input type="date" wire:model="published_at" name="published_at" id="published_at"
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
            FilePond.setOptions({
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('feature_image', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('feature_image', filename, load)
                    }
                },
            });
            FilePond.create($refs.input);">
                <label class="block text-sm font-medium text-gray-600 mb-2">Profile Photo</label>
                <input wire:model="feature_image" accept="image/png, image/jpeg" type="file" x-ref="input">
            </div>
        </div>
        <button type="button" wire:click.prevent="save"
            class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publish</button>
        <button type="button"
            class="rounded-md bg-white ml-5 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Save
            as draft</button>
    </form>

</div>
