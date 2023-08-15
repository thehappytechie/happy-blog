<div>
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
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
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
                    <label for="select-author" class="block text-sm font-medium leading-6 text-gray-900">Author
                        <span class="text-pink-600 text-xs">*</span></label>
                    <div class="mt-2">
                        <select x-data x-init="const tomselect = new TomSelect($refs.select, {
                            plugins: ['remove_button'],
                            maxItems: 1,
                        });
                        tomselect.on('change', (value) => {
                            this.value = value;
                        });" class="input__field @error('user_id') input__field--error @enderror" wire:model="user_id"
                            wire:ignore x-ref="select" x-cloak>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                    <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
                <div>
                    <label for="select-category" class="block text-sm font-medium leading-6 text-gray-900">Category
                        <span class="text-pink-600 text-xs">*</span></label>
                    <div class="mt-2">
                        <select x-data x-init="const tomselect = new TomSelect($refs.select, {
                            plugins: ['remove_button'],
                            maxItems: 1,
                        });
                        tomselect.on('change', (value) => {
                            this.value = value;
                        });" class="peer input__field @error('category_id') input__field--error @enderror"
                            wire:model="category_id" wire:ignore x-ref="select" x-cloak>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
                <div>
                    <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900">Published
                        date</label>
                    <div class="mt-2">
                        <input type="date" wire:model="published_at" id="published_at"
                            class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('published_at')
                    <p>{{ $message }}</p>
                    @enderror
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
                    <label class="block text-sm font-medium text-gray-600 mb-2">Profile Photo</label>
                    <input wire:model="feature_image" accept="image/png, image/jpeg" type="file" x-ref="input">
                </div>
            </div>

            <div class="py-4">
                <button type="button" wire:click.prevent="save"
                    class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save
                    changes</button>
            </div>
        </form>

    </div>

</div>

@push('filepondJs')
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js">
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
</script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush
