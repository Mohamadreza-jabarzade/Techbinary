<!-- filepath: resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'خانه')

@section('content')

    <!-- hero -->
    <section id="hero" class="w-full h-[350px] relative bg-[url(../images/1.jpg)] bg-cover bg-center">

        <div class="containe h-full flex flex-col gap-8 pt-20 items-center">

            <h1 data-aos="fade-left" class="text-3xl md:text-4xl text-center font-extrabold text-white leading-16">به تک
                باینری <br>دنیای تکنولوژی خوش آمدید</h1>
            <p data-aos="fade-up" data-aos-delay="500"
                class="text-white/80 w-full md:w-1/2 px-6 text-center font-black">
                فناوری رو با یه فنجون چای داغ و حال خوب یاد بگیر!
            </p>

        </div>

    </section>
    <!-- heroEnd -->


    <section class="containe md:flex-row-reverse flex flex-col md:gap-2 lg:gap-10 ">

        @include('partials.aside')
        <main id="main" class="w-full relative pb-24 px-2 md:px-5 lg:px-8 md:w-2/3 flex flex-col md:py-10 divide-black/10 divide-y-[1px]">
            <button id="btn-up" onclick="window.scrollTo(0,0);" class="btn-up hidden"><i class="fa fa-arrow-up"></i></button>
            <div class="w-full max-w-5xl mx-auto py-2 md:py-5 h-[600px] px-4">
                <h2 class="text-3xl font-bold text-center mb-5 text-gray-800">محبوب‌ترین ها</h2>

                <div class="swiper mySwiper h-[450px]">
                    <div class="swiper-wrapper pt-8">

                        <div class="swiper-slide">
                            <div
                                class="w-72 h-92 bg-white rounded-3xl  overflow-hidden hover:scale-105 duration-300 relative">
                                <img class="object-cover h-full w-full"
                                    src="/images/church_in_stanford-wallpaper-960x540.jpg" alt="">
                                <a href="#"
                                    class="w-full h-1/3 bg-gradient-to-t from-black via-black to-black/60 z-10 absolute bottom-0 flex flex-col px-4 py-3">
                                    <h3 class="text-light-text-Primary text-xl mb-3 font-bold">عنوان</h3>
                                    <p class="text-light-text-soft truncate">اموزش جاوا اسکریپت از صفر تا صد به همراه
                                        پروژه کاملا رایگان به همراه هدیه
                                    </p>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div
                                class="w-72 h-92 bg-white rounded-3xl  overflow-hidden hover:scale-105 duration-300 relative">
                                <img class="object-cover h-full w-full" src="/images/1.jpg" alt="">
                                <a href="#"
                                    class="w-full h-1/3 bg-gradient-to-t from-black via-black to-black/60 z-10 absolute bottom-0 flex flex-col px-4 py-3">
                                    <h3 class="text-light-text-Primary text-xl mb-3 font-bold">عنوان</h3>
                                    <p class="text-light-text-soft truncate">اموزش جاوا اسکریپت از صفر تا صد به همراه
                                        پروژه کاملا رایگان به همراه هدیه
                                    </p>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div
                                class="w-72 h-92 bg-white rounded-3xl  overflow-hidden hover:scale-105 duration-300 relative">
                                <img class="object-cover h-full w-full" src="/images/image-4 1.png" alt="">
                                <a href="#"
                                    class="w-full h-1/3 bg-gradient-to-t from-black via-black to-black/60 z-10 absolute bottom-0 flex flex-col px-4 py-3">
                                    <h3 class="text-light-text-Primary text-xl mb-3 font-bold">عنوان</h3>
                                    <p class="text-light-text-soft truncate">اموزش جاوا اسکریپت از صفر تا صد به همراه
                                        پروژه کاملا رایگان به همراه هدیه
                                    </p>
                                </a>
                            </div>
                        </div>


                    </div>

                    <div  class="swiper-pagination mt-8"></div>

                </div>
                <button data-aos="fade-up" data-aos-once="false"
                    class="bg-my-second invisible font-bold py-2 px-3 absolute bottom-10 rounded-2xl cursor-pointer text-white text-2xl z-30 left-[50%] translate-x-[-50%]"
                    onclick="load()">بیشتر</button>
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
    const main = document.getElementById("main");
    const aside = document.getElementById("aside");
    const btnUp = document.getElementById("btn-up");
    const bottomOffset = 500;
    const _url = "http://127.0.0.1:8000/load/posts";
    var loaded = false;
    const clientHeight = window.innerHeight;
    document.onscroll = () => {

        const clientPosition = window.scrollY;
        const pageHight = document.documentElement.scrollHeight;

        if(2000 <= clientPosition && btnUp.classList.contains("hidden")){
            btnUp.classList.add("fixed");
            btnUp.classList.remove("hidden");
        }else if(2000 >= clientPosition && btnUp.classList.contains("fixed")){
            btnUp.classList.add("hidden");
            btnUp.classList.remove("fixed");
        }

        if ((pageHight - clientHeight - bottomOffset) <= clientPosition && !loaded) {
            load();
        }



    };

    function load() {
        loaded = true;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", _url);
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = xhr.responseText;
                setTimeout(() => {
                    loaded = false;
                }, 1000);
                create(JSON.parse(response));
            }
        };
        xhr.send();
    }




    function create(response) {
        response.forEach((elem) => {




            let item =
                `
        <div class="post-wrapper" data-aos="zoom-in-up">
                        <!-- Left Content -->
                        <div class="post-left">

                            <!-- Top Section -->
                            <div class="post-author">
                                <img src="images/images1.png" alt="Author" class="post-author-img" />
                                <span class="post-author-text"> ${elem.writer} | ${elem.date}  </span>
                            </div>

                            <!-- Main Content -->
                            <a href="#" class="post-content group">
                                <h1 class="post-title">${elem.title}</h1>
                                <p class="post-excerpt truncate">
                                ${elem.body}
                                </p>
                            </a>

                            <!-- Bottom Section -->
                            <div class="post-footer">
                                <span class="text-sm">
                                    <a href="#" class="post-tag">${elem.category}</a> | ${elem.read}
                                </span>
                                <label class="cursor-pointer" data-postid="${elem.id}">
                                @csrf
                                <span>${elem.likes_count}</span> &nbsp; <span>${elem.view}</span>
                                    <input type="checkbox" name="like" onchange="_like(this)" class="like-checkbox peer" />
                                    <div class="like-icon-wrapper">
                                        <i class="like-icon fa fa-heart"></i>
                                    </div>

                                </label>
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <a href="#" class="post-thumbnail-link">
                            <img src="${elem.image}" alt="Post Thumbnail" class="post-thumbnail-img" />
                        </a>
                    </div>
            `;
            main.insertAdjacentHTML('beforeend', item);


        });



    }

    load();

</script>
@endsection
