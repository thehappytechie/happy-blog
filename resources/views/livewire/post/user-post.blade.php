<div>
    <div class="py-4 mb-8">

        <x-page-heading pageHeading="Posts" />
        <p class="mt-2 text-sm text-gray-700">A list of all your published post</p>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <table class="min-w-full border-separate border-spacing-0">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                        Author</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                        Title & Category</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                                        Status</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                                        Published date</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                        Likes</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr class="even:bg-gray-50">
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                                        {{ $post->user->name}}
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                        {{ $post->title }} <br>
                                        <span
                                            class="mt-1 inline-flex items-center rounded-md bg-blue-50 px-1.5 py-0.5 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                            {{ ucfirst($post->category->name) }}
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                                        <span
                                            class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $post->is_draft == 1 ? 'bg-yellow-50 text-yellow-800 ring-yellow-600/20' : 'bg-green-50 text-green-700 ring-green-600/20' }}">
                                            {{ $post->is_draft == 1 ? 'Draft' : 'Published' }}
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                                        {{ $post->datePostFormat() }}</td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                                        {{ $post->likes->count() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4"> {{ $posts->links() }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
