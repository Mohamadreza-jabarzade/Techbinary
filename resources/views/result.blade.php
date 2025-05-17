@extends('layouts.app')
@section('title', 'خانه')
@section('content')
    @include('partials.alert')



    <section class="containe md:flex-row-reverse flex flex-col md:gap-2 lg:gap-10 ">
        @include('partials.aside')
        <main id="main"
              class="w-full relative pb-24 px-2 md:px-5 lg:px-8 md:w-2/3 flex flex-col md:py-10 divide-black/10 divide-y-[1px]">
            <button id="btn-up" onclick="window.scrollTo(0,0);" class="btn-up hidden">
                <i class="fa fa-arrow-up"></i>
            </button>
            <div class="w-full max-w-5xl mx-auto py-2 md:py-5 h-[600px] px-4">

                <h2 class="text-3xl font-bold text-center mb-5 text-gray-800">نتایج جستجو :</h2>


                <button data-aos="fade-up" data-aos-once="false"
                        class="bg-my-second invisible font-bold py-2 px-3 absolute bottom-10 rounded-2xl cursor-pointer text-white text-2xl z-30 left-[50%] translate-x-[-50%]"
                        onclick="load()">بیشتر
                </button>
            </div>
        </main>
    </section>
@endsection

@section('scripts')
    <script>
        AOS.init({
            once: true,
            duration: 1000,
            easing: 'ease-out-back'
        });
        window.appData = {
            csrf: '{{csrf_token()}}',
            @if(isset($category_name))
            apiUrl: '{{route('loadPosts',$category_name)}}',
            @elseif(isset($searchString))
            apiUrl: '{{route('loadResultPosts',$searchString)}}',
            @else
            apiUrl: '{{route('loadPosts')}}',
            @endif
            user_id: {{ Auth::check() ? Auth::id() : 'null' }}
        };
        const dropdownButton = document.getElementById('dropdownAvatarNameButton');
        const dropdownMenu = document.getElementById('dropdownAvatarName');

        // Toggle dropdown visibility
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
    <script src="/scripts/like.js"></script>
    <script src="/scripts/load-posts.js"></script>
    <script src="/scripts/swiper.js"></script>
@endsection
