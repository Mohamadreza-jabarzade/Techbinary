
<div id="alerts" class="w-full absolute top-0 left-0 flex flex-col space-y-3 px-[60px]">
    <!-- اینجا باید ارور ها یا همون الرت ها رو نشون بدی -->


    <div
        class="alert alert-show alert-success flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800">
        <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            عملیات با موفقیت انجام شد!
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
