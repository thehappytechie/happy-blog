<div class="py-4 px-8">

    <x-page-heading pageHeading="Create Post" />

    <style>
        .filepond--credits {
            display: none;
        }
    </style>

    <form>
        <p class="text-xs text-gray-500"><span class="text-red-600 text-xs">*</span> indicates
            required field</p>
        <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
            <div>
                <label for="title"
                    class="block text-sm font-medium leading-6 text-gray-900">Title
                    <span class="text-pink-600 text-xs">*</span></label>
                <div class="mt-2">
                    <input type="text" id="title" wire:model="title"
                        wire:keyup.debounce.800ms="generateSlug"
                        class="input__field @error('title') input__field--error @enderror">
                </div>
                @error('title')
                    <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
            <div>
                <label for="slug"
                    class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                <div class="mt-2" wire:ignore>
                    <input type="text" id="slug" wire:model="slug" class="input__field"
                        disabled>
                </div>
            </div>
        </div>
        <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
            <div>
                <label for="select-author"
                    class="block text-sm font-medium leading-6 text-gray-900">Author
                    <span class="text-pink-600 text-xs">*</span></label>
                <div class="mt-2">
                    <select x-data x-init="const tomselect = new TomSelect($refs.select, {
                        plugins: ['remove_button'],
                        maxItems: 1,
                    });
                    tomselect.on('change', (value) => {
                        this.value = value;
                    });"
                        class="input__field @error('user_id') input__field--error @enderror"
                        wire:model="user_id" wire:ignore x-ref="select" x-cloak>
                        @foreach ($users as $user)
                            <option value="">Select author</option>
                            <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                    <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
            <div>
                <label for="select-category"
                    class="block text-sm font-medium leading-6 text-gray-900">Category
                    <span class="text-pink-600 text-xs">*</span></label>
                <div class="mt-2">
                    <select x-data x-init="const tomselect = new TomSelect($refs.select, {
                        plugins: ['remove_button'],
                        maxItems: 1,
                    });
                    tomselect.on('change', (value) => {
                        this.value = value;
                    });"
                        class="peer input__field @error('category_id')
input__field--error
@enderror"
                        wire:model="category_id" wire:ignore x-ref="select" x-cloak>
                        @foreach ($categories as $category)
                            <option value="">Select category</option>
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}
                            </option>
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
                <label for="published_at"
                    class="block text-sm font-medium leading-6 text-gray-900">Published date
                    <span class="text-pink-600 text-xs">*</span></label>
                <div class="mt-2">
                    <input type="date" id="published_at" wire:model="published_at"
                        class="peer input__field @error('published_at') input__field--error @enderror">
                </div>
                @error('published_at')
                    <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>
            <div>
                <label for="email"
                    class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
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
                <label class="block text-sm font-medium text-gray-600 mb-2">Featured image</label>
                <input wire:model="feature_image" accept="image/png, image/jpeg" type="file"
                    x-ref="input">
            </div>
            @error('feature_image')
                <x-validation-message> {{ $message }} </x-validation-message>
            @enderror
        </div>
        <div class="pb-8">
            <button type="button" wire:click.prevent="save"
                class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publish</button>
            <button type="button"
                class="rounded-md bg-white ml-5 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Save
                as draft</button>
        </div>
    </form>

</div>
