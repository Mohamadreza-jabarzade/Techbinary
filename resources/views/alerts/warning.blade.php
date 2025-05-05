@if (session('warning'))
    <div
        class="alert alert-show alert-warning flex items-center p-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-600">
        <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M8.257 3.099c.366-.774 1.42-.774 1.786 0l7.451 15.772A1 1 0 0116.451 20H3.549a1 1 0 01-.893-1.129L8.257 3.1z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{ session('warning') }}
        </div>
        <button onclick="hideAlert(this.parentNode)" type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif
