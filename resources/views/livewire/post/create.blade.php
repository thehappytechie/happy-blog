@push('filepondCss')
<link rel="stylesheet" href="{{ asset('css/filepond.css') }}">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

@push('simpleMDECss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

<div class="md:w-9/12 w-full">
    <div class="py-4 mb-8">
        <a href="{{ route('post.index') }}"
            class="pb-4 inline-flex items-center gap-x-1.5 text-sm font-semibold text-orange-600 hover:text-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>Back to posts
        </a>

        <x-page-heading pageHeading="Create Post" />

        <form>
            <p class="text-xs text-gray-500 mt-2"><span class="text-red-600 text-xs">*</span> indicates
                required field</p>
            <div class="border-t border-gray-200 mt-4">
            </div>
            <div class="my-6">
                <div class="relative inline-block w-10 mr-2 align-middle select-none">
                    <input type="checkbox" id="toggle" wire:model="is_draft"
                        class="checked:bg-orange-600 outline-none focus:outline-none right-4 checked:right-0 duration-200 ease-in absolute block w-6 h-6 rounded-full bg-gray-100 border-4 appearance-none cursor-pointer"><label
                        for="toggle" class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer"></label>
                </div>
                <span class="text-gray-500">Post is a draft</span>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-6">
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-800">Title
                        <span class="text-pink-600 text-xs">*</span></label>
                    <div class="mt-2">
                        <input type="text" id="title" wire:model="title" wire:keyup.debounce.200ms="generateSlug"
                            class="input__field">
                    </div>
                    @error('title')
                    <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-800">Slug</label>
                    <div class="mt-2" wire:ignore>
                        <input type="text" id="slug" wire:model="slug" class="input__field" disabled>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 grid-cols-3 md:grid-cols-3 mt-8">
                <div>
                    <x-select name="category_id" label="Category">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <div class="mt-2">
                        <button type="button" wire:click="$emit('openModal', 'add-category-modal')"
                            class="rounded-full bg-orange-600 p-1 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                            <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="tag" class="block text-sm font-medium leading-6 text-gray-800">Tags</label>
                    <div class="mt-2">
                        <input type="text" name="tag" id="tag" class="input__field">
                    </div>
                </div>
                <div>
                    <label for="published_at" class="block text-sm font-medium leading-6 text-gray-800">Published date
                        <span class="text-pink-600 text-xs">*</span></label>
                    <div class="mt-2">
                        <input type="date" id="published_at" wire:model="published_at" class="input__field">
                    </div>
                    @error('published_at')
                    <x-validation-message> {{ $message }} </x-validation-message>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 mt-8">
                <x-filepond.create-upload>
                    </x-create-filepond-upload>
            </div>
            @error('feature_image')
            <x-validation-message> {{ $message }} </x-validation-message>
            @enderror

            <div class="mt-8">
                <x-simple-mde.text-editor></x-simple-mde.text-editor>
                @error('contents')
                <x-validation-message> {{ $message }} </x-validation-message>
                @enderror
            </div>

            <div class="py-4">
                <x-button action="save"
                    class="rounded-md bg-orange-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                    {{ $is_draft ? 'Publish as draft' : 'Save and Publish' }}
                </x-button>
            </div>
        </form>

    </div>

</div>

@push('simpleMDE')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endpush

@push('filepondJs')
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js">
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
</script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush
