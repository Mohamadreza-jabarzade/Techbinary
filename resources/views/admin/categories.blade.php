@extends('layouts.admin.admin')
@section('title','دسته بندی ها')
@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">

{{--        show alerts here--}}
        @include('partials.alert')
        <!-- Header -->
        <header class="flex justify-between flex-row items-center mb-5 p-5">
            <h1 class="text-3xl text-dark-text-Primary"><i class="fa fa-folder-open ml-3"></i>
                دسته‌بندی‌ها </i>
            </h1>
            <a href="{{route('showCategoryManage',null)}}" class="bg-my-second text-white font-bold px-3 py-2 rounded-xl">
                افزودن
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
                            <th scope="col" class="px-6 py-3">نام</th>
                            <th scope="col" class="px-6 py-3">slug</th>
                            <th scope="col" class="px-6 py-3">تعداد پست‌ها</th>
                            <th scope="col" class="px-6 py-3">وضعیت</th>
                            <th scope="col" class="px-6 py-3">عملیات</th>
                        </tr>
                        </thead>
                        <tbody id="rows">
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td data-search="on" class="search">{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->posts_count}}</td>
                            <td class="{{ $category->status == 'active' ? 'text-green-500' : 'text-red-500' }}">
                                {{ $category->status == 'active' ? 'فعال' : 'غیرفعال' }}
                            </td>
                            <td class="px-2 w-72 py-4">
                                <div class="flex text-center justify-center items-center gap-2">
                                    <a href="{{route('showCategoryManage',$category->id)}}" class="bg-sky-500 admin-table-btn td-action">ویرایش</a>
                                    <form method="post" action="{{route('changeCategoryStatus')}}">
                                        @csrf
                                        @method('PATCH')
                                        <input name="id" type="hidden" value="{{$category->id}}">
                                        <button class="bg-green-500 admin-table-btn td-action">تغییر وضعیت</button>
                                    </form>
                                    <form method="post" action="{{route('categoryDelete')}}">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" value="{{$category->id}}" name="id">
                                        <button type="submit" class="bg-red-500 admin-table-btn td-action">حذف</button>
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

@endsection



