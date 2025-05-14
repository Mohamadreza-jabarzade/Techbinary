@extends('layouts.admin.admin')
@section('title','پست جدید')
@section('customLinks')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
@endsection
@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <!-- Main Content -->
    <main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">

        <!-- اینجا باید ارور ها یا همون الرت ها رو نشون بدی -->
        @include('partials.alert')

        <!-- Header -->
        <header class="flex justify-between flex-row items-center mb-5 p-5">
            <h1 class="text-3xl text-dark-text-Primary"><i class="fa fa-file-text ml-3"></i>
                پست جدید</i>
            </h1>
        </header>

        <!-- Table -->
        <section class="flex-1 overflow-hidden rounded-2xl">
            <div class="h-full overflow-y-auto space-y-5 p-5" dir="ltr">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-light-text-Primary p-3">


                    <form id="new" action="{{route('createNewPost')}}" method="post" enctype="multipart/form-data" class="p-10 w-full flex gap-10 flex-col flex-wrap" dir="rtl">
                        @csrf
                        <div class="flex gap-10">
                            <label class="flex flex-col">
                                عنوان :
                                <input
                                       name="title"
                                       type="text"
                                       class="text-right outline-none border-none placeholder:text-right hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3"
                                       placeholder="اموزش">
                            </label>
                            <div class="flex flex-col">
                                <label>دسته‌بندی:</label>
                                <select name="category_id" id="categorySelect"
                                        class="text-right outline-none border-none hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3">
                                    <option value="" disabled selected>یک دسته‌بندی انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label>تصویر پست:</label>
                                <input name="image" type="file" id="fileInput" accept="image/*" class="block w-64 text-sm text-gray-500 my-3
                                        file:ml-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100
                                        text-right" />
                                <div id="preview" class="mt-2 flex justify-center">
                                    <img id="imagePreview" class="w-64 h-auto rounded-lg hidden"
                                         alt="تصویر پیش‌نمایش" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <div id="toolbar-container" dir="ltr">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                    </span>
                                <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                <span class="ql-formats">
                                        <button class="ql-header" value="1"></button>
                                        <button class="ql-header" value="2"></button>
                                        <button class="ql-blockquote"></button>
                                        <button class="ql-code-block"></button>
                                    </span>
                                <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                    </span>
                                <span class="ql-formats">
                                        <button class="ql-direction" value="rtl"></button>
                                        <select class="ql-align"></select>
                                    </span>
                                <span class="ql-formats">
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                        <button class="ql-video"></button>
                                        <button class="ql-formula"></button>
                                    </span>
                            </div>
                            <div id="editor">
                            </div>
                        </div>
                        <button type="submit" class="bg-my-second cursor-pointer text-white font-bold px-3 py-2 rounded-xl max-w-20 text-center">انتشار</button>
                        <input type="hidden" name="body" id="bodyInput">
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection
@section('customScripts')

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script>
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('imagePreview');

        document.querySelector('#new').addEventListener('submit', function (e) {
            const content = document.querySelector('.ql-editor').innerHTML;
            document.getElementById('bodyInput').value = content;
        });

        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.classList.add('hidden');
            }
        });
    </script>
    <script>
        const quill = new Quill('#editor', {
            modules: {
                toolbar: '#toolbar-container',
            },
            placeholder: 'چیزی بنویسید.',
            theme: 'snow',
        });
    </script>


@endsection


