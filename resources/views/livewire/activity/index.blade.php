<div>
    <div class="py-4 mt-2">

        <a href="{{ route('setting.index') }}"
            class="pb-4 inline-flex items-center gap-x-1.5 text-sm font-semibold text-indigo-800 hover:text-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>Back to settings
        </a>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <x-page-heading pageHeading="Activity Log" />
                    <p class="mt-2 text-sm text-gray-700">A list of all the users and their site wide activity</p>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <table class="min-w-full border-separate border-spacing-0">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                        Event</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                                        Model</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                                        URL</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                        Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audits as $audit)
                                <tr class="even:bg-gray-50">
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                        {{ $audit->user->name ?? '' }} <br>
                                        <span
                                            class="mt-1 inline-flex items-center rounded-md bg-blue-50 px-1.5 py-0.5 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                            {{ $audit->event}}
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                                        {{ $audit->auditable_type}} </td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                                        {{ $audit->url }}</td>
                                    <td
                                        class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                                        {{ $audit->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4"> {{ $audits->links() }}</div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
