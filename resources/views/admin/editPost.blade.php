@extends('layouts.admin.admin')

@section('title','ویرایش پست')

@section('customLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.1.0/ckeditor5.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <main class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">
        @include('partials.alert')

        <header class="flex justify-between flex-row items-center mb-5 p-5">
            <h1 class="text-3xl text-dark-text-Primary"><i class="fa fa-file-text ml-3"></i> ویرایش پست </h1>
        </header>

        <section class="flex-1 overflow-hidden rounded-2xl">
            <div class="h-full overflow-y-auto space-y-5 p-5" dir="ltr">
                <div class="h-full overflow-y-auto shadow-md sm:rounded-lg bg-light-text-Primary p-3">
                    @if ($errors->any())

                            <ul class="text-right list-disc list-inside text-red-500 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                    @endif
                    <form id="new" action="{{ route('editPost') }}" method="post" enctype="multipart/form-data" class="p-10 w-full flex gap-10 flex-col flex-wrap" dir="rtl">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <div class="flex gap-10">
                            <label class="flex flex-col">
                                عنوان :
                                <input value="{{$post->title}}" name="title" type="text" class="text-right outline-none border-none placeholder:text-right hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3" placeholder="آموزش">
                            </label>

                            <div class="flex flex-col">
                                <label>دسته‌بندی:</label>
                                <select name="category_id" id="categorySelect" class="text-right outline-none border-none hover:ring-1 focus:ring-1 ring-sky-500 ring-offset-2 transition-all duration-300 bg-light-text-soft h-8 w-64 rounded-md px-2 my-3">
                                    <option value="
                                    @foreach($categories as $category)
                                        @if($category->id == $post->category_id)
                                            {{$category->id}}
                                        @endif
                                    @endforeach
                                    " selected>
                                        @foreach($categories as $category)
                                            @if($category->id == $post->category_id)
                                                {{$category->name}}
                                            @endif
                                        @endforeach
                                    </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label>بروزرسانی تصویر پست:</label>
                                <input  name="image" type="file" id="fileInput" accept="image/*" class="block w-64 text-sm text-gray-500 my-3
                                    file:ml-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100
                                    text-right" />
                                <div id="preview" class="mt-2 flex justify-center">
                                    <img id="imagePreview" class="w-64 h-auto rounded-lg" alt="تصویر پیش‌نمایش" src="{{asset('storage/'.$post->image)}}">
                                </div>
                            </div>
                        </div>

                        <div class="main-container">
                            <div
                                class="editor-container editor-container_classic-editor editor-container_include-block-toolbar editor-container_include-fullscreen"
                                id="editor-container">
                                <div class="editor-container__editor">
                                    <div id="editor">
                                        {!! $post->body !!}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <textarea name="body" id="bodyInput" class="hidden"></textarea>

                        <button type="submit" class="bg-my-second cursor-pointer text-white font-bold px-3 py-2 rounded-xl max-w-20 text-center">انتشار</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('customScripts')
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/45.1.0/ckeditor5.umd.js"></script>
    <script src="/scripts/main.js"></script>

    <script>


        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('imagePreview');

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
@endsection
