@extends('layouts.app')
@section('title', 'خانه')
@section('content')
    @include('partials.alert')

    <!-- hero -->
    <section id="hero" class="w-full h-[350px] relative bg-[url(../images/1.jpg)] bg-cover bg-center">
        <div class="containe h-full flex flex-col gap-8 pt-20 items-center">
            <h1 data-aos="fade-left"
                class="text-3xl md:text-4xl text-center font-extrabold text-white leading-16">به تک باینری <br>دنیای تکنولوژی خوش آمدید</h1>
            <p data-aos="fade-up" data-aos-delay="500"
               class="text-white/80 w-full md:w-1/2 px-6 text-center font-black">فناوری رو با یه فنجون چای داغ و حال خوب یاد بگیر!</p>
        </div>
    </section>
    <!-- heroEnd -->

    <section class="containe md:flex-row-reverse flex flex-col md:gap-2 lg:gap-10 ">
        @include('partials.aside')
        <main id="main"
              class="w-full relative pb-24 px-2 md:px-5 lg:px-8 md:w-2/3 flex flex-col md:py-10 divide-black/10 divide-y-[1px]">
            <button id="btn-up" onclick="window.scrollTo(0,0);" class="btn-up hidden">
                <i class="fa fa-arrow-up"></i>
            </button>
            <div class="w-full max-w-5xl mx-auto py-2 md:py-5 h-[600px] px-4">
                @if(isset($category_name))
                    <h2 class="text-3xl font-bold text-center mb-5 text-gray-800">محبوب‌ترین های {{$category_name}}</h2>
                @else
                    <h2 class="text-3xl font-bold text-center mb-5 text-gray-800">محبوب‌ترین ها </h2>
                @endif

                <div class="swiper mySwiper h-[450px]">
                    <div class="swiper-wrapper pt-8">

                        @foreach($popularPosts as $post)
                            <div class="swiper-slide">
                                <div
                                    class="w-72 h-92 bg-white rounded-3xl  overflow-hidden hover:scale-105 duration-300 relative">
                                    <img class="object-cover h-full w-full"
                                         src="{{asset('storage/'.$post->image)}}" alt="">
                                    <a href="{{route('showPostDetail',$post->title)}}"
                                       class="w-full h-1/3 bg-gradient-to-t from-black via-black to-black/60 z-10 absolute bottom-0 flex flex-col px-4 py-3">
                                        <h3 class="text-light-text-Primary text-xl mb-3 font-bold">{{ $post->title }}</h3>
                                        <p class="text-light-text-soft truncate">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($post->body), 200, '...') !!}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination mt-8"></div>

                </div>

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
