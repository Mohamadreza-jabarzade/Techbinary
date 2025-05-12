@extends('layouts.admin.admin')
@section('title','مدیریت دسته بندی')

@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <!-- Main Content -->
    <main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">
        <!-- اینجا باید ارور ها یا همون الرت ها رو نشون بدی -->


        <!-- Header -->
        <header class="flex justify-between flex-row items-center mb-5 p-5">
            <h1 id="pageTitle" class="text-3xl text-dark-text-Primary"></h1>

        </header>

        <section class="flex-1 overflow-hidden rounded-2xl">
            <div class="h-full overflow-y-auto space-y-5 p-5">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-light-text-Primary min-h-52">

                    <form id="new" action="{{route('createCategory')}}" method="post" class="p-10 w-full flex gap-10 flex-col hidden">
                        @csrf
                        <div class="flex gap-10 ">
                            <label class="flex flex-col">
                                نام :
                                <input type="text"
                                       name="name"
                                       class="text-right outline-none border-none placeholder:text-right hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3"
                                       placeholder="اموزش">
                            </label>
                            <label class="flex flex-col">
                                slug :
                                <input type="text"
                                       name="slug"
                                       class="outline-none border-none hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3"
                                       placeholder="learning">
                            </label>
                        </div>
                        <button class="bg-my-second cursor-pointer text-white font-bold px-3 py-2 rounded-xl max-w-20 text-center">افزودن</button>
                    </form>
                    <form id="edit" action="" method="post" class="p-10 w-full flex gap-10 flex-col hidden">
                        <div class="flex gap-10 ">
                            <label class="flex flex-col">
                                نام :
                                <input type="text"
                                       class="text-right outline-none border-none placeholder:text-right hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3"
                                       placeholder="اموزش">
                            </label>
                            <label class="flex flex-col">
                                عنوان :
                                <input type="text"
                                       class="text-right outline-none border-none placeholder:text-right hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3"
                                       placeholder="اموزش">
                            </label>
                        </div>
                        <button class="bg-orange-500 cursor-pointer text-white font-bold px-3 py-2 rounded-xl max-w-20 text-center">افزودن</button>
                    </form>

                </div>
            </div>
        </section>

    </main>
@endsection
@section('customScripts')
    <script>
        const hash = window.location.hash || null;
        if (hash !== null) {
            document.getElementById("pageTitle").innerHTML = '<i class="fa fa-folder-open ml-3"></i>' + "ویرایش دسته بندی ها";
            document.getElementById("edit").classList.remove("hidden");
        } else {
            document.getElementById("pageTitle").innerHTML = '<i class="fa fa-folder-open ml-3"></i>' + "ساخت دسته بندی جدید";
            document.getElementById("new").classList.remove("hidden");
        }
    </script>
@endsection


