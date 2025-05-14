@if(session('success'))
    <div id="alerts" class="w-full absolute top-0 left-0 flex flex-col space-y-3 px-[60px]">
        <div
            class="alert alert-show alert-success flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800">
            <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{session('success')}}
            </div>
            <button onclick="hideAlert(this.parentNode)" type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-2" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@elseif(session('error'))
    <div id="alerts" class="w-full absolute top-0 left-0 flex flex-col space-y-3 px-[60px]">
    <div
        class="alert alert-show alert-error flex items-center p-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800">
        <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v4a1 1 0 002 0v-2a1 1 0 00-2 0v1a1 1 0 002 0v-1a1 1 0 00-2 0v1a1 1 0 002 0z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{session('error')}}
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
@elseif(session('warning'))
            <div id="alerts" class="w-full absolute top-0 left-0 flex flex-col space-y-3 px-[60px]">
    <div
        class="alert alert-show alert-warning flex items-center p-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-600">
        <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M8.257 3.099c.366-.774 1.42-.774 1.786 0l7.451 15.772A1 1 0 0116.451 20H3.549a1 1 0 01-.893-1.129L8.257 3.1z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{session('warning')}}
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
@elseif(session('info'))
                    <div id="alerts" class="w-full absolute top-0 left-0 flex flex-col space-y-3 px-[60px]">
    <div
        class="alert alert-show alert-info flex items-center p-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800">
        <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-9-1V7a1 1 0 012 0v2a1 1 0 01-2 0zm0 4v-2a1 1 0 012 0v2a1 1 0 01-2 0z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{session('info')}}
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
