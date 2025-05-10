@extends('layouts.admin.admin')
@section('title','کاربران')
@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">

{{--        show alerts here--}}


        <!-- Header -->
        <header class="flex justify-between flex-row items-center mb-5 p-5">
            <h1 class="text-3xl text-dark-text-Primary"><i class="fa fa-comment ml-3"></i>کاربران</i>
            </h1>
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
                            <th scope="col" class="px-6 py-3">نام کاربری</th>
                            <th scope="col" class="px-6 py-3">ایمیل</th>
                            <th scope="col" class="px-6 py-3">نوع</th>
                            <th scope="col" class="px-6 py-3">عملیات</th>
                        </tr>
                        </thead>
                        <tbody id="rows">
                        <!-- Row 1 -->
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td data-search="on">{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role == 'user' ? 'کاربر' : 'ادمین'}}</td>
                                <td class="px-2 w-72 py-4">
                                    <div class="flex text-center justify-center items-center gap-2">
                                        <form method="post" action="{{route('userRoleChange')}}">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                        <button class="bg-green-500 admin-table-btn td-action">تغییر
                                            نوع</button>
                                        </form>

                                        <form method="post" action="{{route('userDelete')}}">
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            @csrf
                                            <button
                                                type="submit" class="bg-red-500 admin-table-btn td-action">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
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



