<div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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

        @if ($post->is_archived == 1)
        <x-warning-box bgColor="bg-yellow-50" iconColor="text-yellow-400"
            iconPath="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z">
            <h3 class="text-sm font-medium text-yellow-800">This post is archived. Archived posts are hidden but not
                deleted.</h3>
        </x-warning-box>
        @elseif ($post->is_draft == 1)
        <x-warning-box bgColor="bg-orange-100" iconColor="text-orange-400"
            iconPath="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z">
            <div class="flex-1 md:flex md:justify-between">
                <p class="text-sm text-orange-700">This post is a draft. Publish this post by clicking the ‘Publish’
                    button, the post will be published immediately.</p>
                <p class="mt-3 text-sm md:ml-6 md:mt-0">
                    <button type="button" wire:click.prevent="draft"
                        class="whitespace-nowrap font-semibold text-orange-700 hover:text-orange-600">Publish</button>
                </p>
            </div>
        </x-warning-box>
        @endif

        <form>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-6">
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-800">Title</label>
                    <div class="mt-2">
                        <input type="text" id="title" wire:model="title" wire:keyup.debounce.800ms="generateSlug"
                            class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-800 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('title')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-800">Slug</label>
                    <div class="mt-2">
                        <input type="text" id="slug" wire:model="slug"
                            class="outline-none bg-gray-50 block w-full rounded-md border-0 px-3 py-2 text-gray-800 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            disabled>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
                <x-select name="user_id" label="Author">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                    @endforeach
                </x-select>
                <x-select name="category_id" label="Category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="grid gap-5 grid-cols-2 md:grid-cols-2 mt-8">
                <div>
                    <label for="published_at" class="block text-sm font-medium leading-6 text-gray-800">Published
                        date</label>
                    <div class="mt-2">
                        <input type="date" wire:model="published_at"
                            value="{{ \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}" id="published_at"
                            class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-800 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('published_at')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tags" class="block text-sm font-medium leading-6 text-gray-800">Tags</label>
                    <div class="mt-2">
                        <input type="text" name="tags" id="tags"
                            class="outline-none block w-full rounded-md border-0 px-3 py-2 text-gray-800 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class="overflow-auto mt-8">
                <x-filepond.edit-upload :post="$post"></x-filepond.edit-upload>
                <label class="block text-sm font-medium text-gray-800 mb-2">Featured image</label>
                <input wire:model="feature_image" accept="image/png, image/jpeg" type="file" x-ref="input">
            </div>
            <div class="mt-8" wire:ignore>
                <x-quill.text-editor> {!! $post->contents !!}</x-quill.text-editor>
            </div>

            <div class="py-4">
                <x-button action="save"
                    class="rounded-md bg-indigo-600 mt-5 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save changes
                </x-button>
                @if ($post->is_draft != 1)
                <x-button action="archive"
                    class="rounded-md bg-gray-50 mt-5 ml-4 px-3.5 py-2.5 text-sm font-semibold text-gray-600 border border-gray-600 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ $post->is_archived == 0 ? 'Archive post' : 'Unarchive post' }}
                </x-button>
                @endif
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

@push('quillJs')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
