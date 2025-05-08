@extends('layouts.admin.admin')
@section('title','پست ها')
@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">

{{--        show alerts here--}}

        <!-- Header -->
        <header class="flex justify-between flex-row items-center mb-5 p-5">
            <h1 class="text-3xl text-dark-text-Primary"><i class="fa fa-file ml-3"></i>
                پست ها </i>
            </h1>
            <a href="{{route('showNewPost')}}" class="bg-my-second text-white font-bold px-3 py-2 rounded-xl">
                ساخت
            </a>
        </header>

        <!-- Table -->
        <section class="flex-1 overflow-hidden rounded-2xl">
            <div class="h-full overflow-y-auto space-y-5 p-5">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-light-text-Primary">

                    <div id="search"
                         class="flex flex-row items-center text-center bg-light-text-soft h-8 w-52 rounded-md px-2 my-3 mr-3">
                        <input type="text" oninput="search(this.value)" placeholder="جستوجو..."
                               class="w-44 text-right h-full px-2 outline-none border-none placeholder:text-right">
                        <i class="fa fa-search w-5"></i>
                    </div>


                    <table dir="rtl" class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-sm text-center uppercase bg-sky-900 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">ای دی</th>
                            <th scope="col" class="px-6 py-3">عنوان</th>
                            <th scope="col" class="px-6 py-3">دسته بندی</th>
                            <th scope="col" class="px-6 py-3">پوستر</th>
                            <th scope="col" class="px-6 py-3">نویسنده</th>
                            <th scope="col" class="px-6 py-3">بازدید</th>
                            <th scope="col" class="px-6 py-3">کامنت</th>
                            <th scope="col" class="px-6 py-3">وضعیت</th>
                            <th scope="col" class="px-6 py-3">عملیات</th>
                        </tr>
                        </thead>
                        <tbody id="rows">
                        <!-- Row 1 -->
                        @foreach($posts as $post)

                        @endforeach
                        </tbody>
                    </table>
                    <h3 id="noResult" class="hidden text-center mx-auto text-lg text-red-600 my-2">چیزی پیدا نشد
                    </h3>
                </div>
            </div>
        </section>
    </main>
    </div>


    <div id="view"
         class="hidden flex justify-center items-center flex-col gap-5 absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] bg-white rounded-2xl p-3 shadow-[0_0_15px_5px] shadow-black/30 ">
        <div class="w-full"><button onclick="closeView()" class="cursor-pointer"><i class="fa fa-close"></i></button>
        </div>
        <img class="w-full flex-1 object-cover rounded-2xl"
             src="/images/church_in_stanford-wallpaper-960x540.jpg" alt="">

    </div>
@endsection



