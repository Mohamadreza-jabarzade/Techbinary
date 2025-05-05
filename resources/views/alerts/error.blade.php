@if (session('error'))
    <div
        class="alert alert-show alert-error flex items-center p-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800">
        <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v4a1 1 0 002 0v-2a1 1 0 00-2 0v1a1 1 0 002 0v-1a1 1 0 00-2 0v1a1 1 0 002 0z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
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
