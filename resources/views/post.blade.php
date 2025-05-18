@extends('layouts.app')
@section('title', 'خانه')
@section('content')
    @include('partials.alert')
    <section class="containe md:flex-row-reverse flex flex-col md:gap-2 lg:gap-10 h-full">
        @include('partials.aside')
        <main id="main" class="w-full relative pb-24 pl-2 lg:pl-8 md:w-2/3 flex flex-col md:pl-5 md:py-10 h-full mb-10">

            <!-- Author -->
            <div class="post-author mb-10 px-4">
                <img src="/images/images1.png" alt="Author" class="post-author-img" />
                <div class="flex flex-col justify-center">
                    <span class="post-author-text">{{ $post->writer }}</span>
                    <span class="text-[13px] opacity-60 font-medium">{{ $post->read_time }} | {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                </div>

                <!-- Icons -->
                <div class="icon-wrapper h-20 flex items-start gap-1 md:gap-3">
                    <a href="" class="flex flex-col items-center justify-center"> <i class="fa fa-telegram icon"></i></a>
                    <a href="" class="flex flex-col items-center justify-center"> <i class="fa fa-instagram icon"></i></a>

                    <!-- Bookmark -->
                    <label>
                        <input type="checkbox" class="icon-checkbox bookmark-toggle" hidden />
                        <i class="fa fa-bookmark-o bookmark-icon"></i>
                    </label>
                </div>
            </div>

            <!-- Quill Viewer -->
            <div id="viewer" class="w-full ql-container ql-bubble ql-disabled">
                <div class="ql-editor" data-gramm="false" contenteditable="false">
                {!! $post->body !!}
                </div>
            </div>

            <!-- Tags and Bottom Icons -->

            <div class="flex flex-col">
                <div class="w-full flex flex-wrap gap-2 justify-start items-start content-start">
                    <a href="" class="aside-category">category</a>
                    <a href="" class="aside-category">go</a>
                    <a href="" class="aside-category">like</a>
                    <a href="" class="aside-category">content</a>
                </div>

                <div class="icon-wrapper h-20 flex items-start w-full">
                    <!-- Like -->
                    <label onclick="_like()" class="flex flex-col items-center justify-center">
                        <input type="checkbox" class="icon-checkbox like-toggle" hidden>
                        <i class="fa fa-heart-o like-icon"></i>
                        <span class="text-sm text-dark-text-soft">{{$post->likes_count}}</span>
                    </label>
                    <span class="flex flex-col items-center justify-center">
                        <i class="fa fa-eye icon"></i>
                        <span class="text-sm text-dark-text-soft">{{$post->view}}</span>
                    </span>

                    <!-- Bookmark -->
                    <label>
                        <input type="checkbox" class="icon-checkbox bookmark-toggle" hidden>
                        <i class="fa fa-bookmark-o bookmark-icon"></i>
                    </label>

                    <!-- link -->
                    <button onclick="copyLinkToClipboard()">
                        <i class="fa fa-link link-icon"></i>
                    </button>
                </div>
            </div>

            <hr class="hr-post" />

            <!-- Comments Section -->
            <div id="comments" class="w-full flex flex-col py-10 justify-center items-center space-y-5">
                <div>
                    <i class="fa fa-comment p-4 bg-sky-700 rounded-full text-white text-lg"></i>
                    <span class="text-lg font-bold text-dark-text-soft px-2">کامنت ها</span>
                </div>

                <!-- Comment Form -->
                <form action="{{route('createComment')}}" method="post" class="w-full border border-black/10 px-3 py-4 space-y-3">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="post-author mb-10">
                        <img  src="/images/images1.png" alt="Author" class="post-comment-img" />
                        <div class="flex flex-col justify-center">
                            <span class="post-comment-text">
                                @auth
                                    {{ auth()->user()->username }}
                                @else
                                    <a href="{{ route('showLogin') }}">وارد شوید</a>
                                @endauth
                            </span>
                        </div>
                    </div>

                    <textarea
                        @auth()
                        @else
                            disabled
                        @endauth
                        name="content" class="w-full h-auto resize-none border-none outline-none"
                              placeholder="چیزی بنویسید."></textarea>
                    <hr class="hr-post" />

                    <div class="w-full flex items-center justify-end gap-5">
                        <button type="reset"
                                class="bg-transparent border-gray-700 border-2 rounded-2xl px-3 py-1.5 text-black text-sm font-bold">انصراف</button>
                        @auth()
                            <button type="submit"
                                    class="bg-blue-400 rounded-2xl px-3 py-1.5 text-white text-sm font-bold">ارسال نظر</button>
                        @else
                            <a href="{{ route('showLogin', ['next' => url()->full()]) }}"
                                    class="bg-blue-400 rounded-2xl px-3 py-1.5 text-white text-sm font-bold">لطفا ابتدا وارد شوید</a>
                        @endauth
                    </div>
                </form>

                <!-- Existing Comment -->
                @foreach($post->comments as $comment)
                    <div class="w-full border border-black/10 px-3 py-4">
                        <div class="post-author mb-5">
                            <img src="/images/images1.png" alt="Author" class="post-comment-img" />
                            <div class="flex flex-col justify-center">
                                <span class="post-comment-text text-dark-text-soft">{{$comment->author}}</span>
                                <span class="text-[13px] opacity-60 font-medium">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                            </div>
                        </div>
                        <p>{{$comment->content}}</p>
                    </div>
                @endforeach
            </div>
        </main>
    </section>
@endsection

@section('scripts')
    <script>
        function copyLinkToClipboard() {
            // آدرس فعلی صفحه
            const link = window.location.href;
            // کپی به کلیپ‌بورد
            navigator.clipboard.writeText(link)

        }
    </script>
    <script src="/scripts/like.js"></script>
    <script src="/scripts/client-search.js"></script>
    <script src="/scripts/like.js"></script>
    <script src="/scripts/alert.js"></script>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        document.querySelector('.link-icon').parentNode.addEventListener("click", () => {
            navigator.clipboard.writeText(window.location.href);
        })
        const dropdownButton = document.getElementById('dropdownAvatarNameButton');
        const dropdownMenu = document.getElementById('dropdownAvatarName');

        // Toggle dropdown visibility
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
@endsection
