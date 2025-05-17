    <!-- header -->
    <header class="containe h-16 flex justify-between items-center px-1">

        <!-- logo -->
        <img src="/Logo.png" alt="TechBinary" class="w-28">
        <!-- logeEnd -->


        <!-- search -->
        <form id="search" method="get" action="{{route('showResultPosts')}}"
            class="group hidden md:flex bg-light-text-soft rounded-3xl h-2/3 items-center p-1 gap-1">
            @csrf
            <div class="rounded-full size-8 text-dark-text-Primary flex justify-center items-center"><i
                    class="fa fa-search"></i></div>

            <input type="text" class="input-search" placeholder="جستوجوی باینری...">

            <button type="submit" class="btn-search"><i class="fa fa-arrow-left"></i></button>
        </form>
        <!-- searchEnd -->


        @guest()
            <!-- auth -->
            <div class="flex gap-2 items-center">
                <a class="px-3 pb-1 text-dark-text-Primary text-lg" href="{{route('showLogin')}}">ورود</a>
                <a class="rounded-2xl bg-my-second text-light-text-Primary px-3 py-1 font-bold text-md" href="{{route('showRegister')}}">ثبت نام</a>
            </div>
            <!-- authEnd -->
        @endguest
        @auth()

            <!-- Userlog -->

            <div class="relative">
                <button id="dropdownAvatarNameButton"
                        class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 cursor-pointer"
                        type="button">
                    <span class="sr-only">Open user menu</span>
                    <svg class="w-2.5 h-2.5 mx-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4" />
                    </svg>
                    {{auth()->user()->username}}
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownAvatarName" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 absolute top-full left-0 md:right-0 mt-6 text-center">
                    <div class="px-4 py-3 text-sm text-gray-900">
                        <div class="truncate">{{auth()->user()->email}}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700">
                        @if(auth()->user()->role == 'admin')
                            <li><a href="{{route('showDashboard')}}" class="block px-4 py-2 hover:bg-gray-100">پنل مدیریت</a></li>
                        @endif
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a></li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full">خروج</button>
                    </form>
                </div>
            </div>
            <!-- UserlogEnd -->
        @endauth

    </header>
    <!-- headerEnd -->
