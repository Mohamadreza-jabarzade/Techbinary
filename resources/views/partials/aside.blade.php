<aside id="aside" class="w-full md:w-1/3 md:min-h-full flex flex-col border-r-2 p-2 md:pr-8 border-black/10 pt-10 md:py-10 gap-5">

    <div class=" md:hidden mb-10 ">
        <div class="w-full  flex flex-wrap gap-2 justify-start items-start content-start bg-slate-200 p-3 rounded-2xl">
            <h2 class="text-xl w-full text-center justify-center flex items-center gap-2 text-dark-text-soft mb-2">دسته بندی ها</h2>
            <div id="mobile-category" class="grid grid-cols-2 w-full text-center space-y-5 overflow-hidden relative transition duration-700">
                @foreach($categories as $category)
                <a href="" class="aside-category-mobile">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
    </div >
    <!-- ad -->

    <!-- <a href="">
        <div id="advertisment" class="w-full h-52 bg-slate-200 flex items-center justify-center rounded-2xl">
            <h1 class="text-center text-2xl font-bold">Your AD <br>Here</h1>
        </div>
    </a> -->

    <!-- adEnd -->

    <div class="hidden md:block top-10 space-y-5 md:sticky">
        <div class="w-full  flex flex-wrap gap-2 justify-start items-start content-start">
            <h2 class="text-xl w-full text-right flex items-center gap-2 text-dark-text-soft mb-2"><span
                    class="flex justify-center items-center rounded-full bg-light-text-soft size-10 text-base"><i
                        class="fa fa-flag"></i></span>دسته بندی ها</h2>
            @foreach($categories as $category)
                <a href="" class="aside-category">{{$category->name}}</a>
            @endforeach
        </div>
    </div>

</aside>
