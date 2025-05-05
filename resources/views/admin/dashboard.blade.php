@extends('layouts.admin.admin')
@section('title','داشبورد')
@section('aside')
    @include('layouts.admin.aside')
@endsection

@section('content')
    <div class="w-4/5 h-full bg-light-text-soft flex flex-col px-10 py-5 relative">

{{--        show alerts here--}}


        <header class="w-full flex justify-between items-center flex-row mb-5 p-5">
            <h1 class="text-3xl text-dark-text-Primary "><i class="fa fa-shield ml-3"></i>داشبورد</h1>
            <a href="https://10learn.ir:2083"
               class="text-center bg-my-second rounded-xl px-3 py-2 font-bold text-white">پنل هاست</a>
        </header>
        <div class="h-full w-full overflow-y-hidden rounded-2xl">
            <div dir="ltr" class="h-full w-full overflow-y-auto space-y-5 p-5">

                <!-- Cards Grid -->
                <div class="grid grid-cols-4 gap-5 h-56 w-full">

                    <!-- Card 1 -->

                    <div class="dashboard-cards">
                        <div>
                            <h1>516</h1>
                            <span>تعداد کاربران</span>
                        </div>
                        <a href="users.html" class="w-full mt-auto auth-btn rounded-none">بیشتر</a>
                    </div>

                    <!-- Card 2 -->

                    <div class="dashboard-cards">
                        <div>
                            <h1>516</h1>
                            <span>تعداد پست های فعال</span>
                        </div>
                        <a href="posts.html#actives" class="w-full mt-auto auth-btn rounded-none">بیشتر</a>
                    </div>

                    <!-- Card 3 -->

                    <div class="dashboard-cards">
                        <div>
                            <h1>516</h1>
                            <span>تعداد دسته بندی ها</span>
                        </div>
                        <a href="categories.html" class="w-full mt-auto auth-btn rounded-none">بیشتر</a>
                    </div>

                    <!-- Card 4 -->

                    <div class="dashboard-cards">
                        <div>
                            <h1>516</h1>
                            <span>تعداد نویسندگان</span>
                        </div>
                        <a href="users.html#writers" class="w-full mt-auto auth-btn rounded-none">بیشتر</a>
                    </div>

                </div>

                <!-- Chart Section -->
                <div
                    class="chart flex items-center justify-center w-full h-72 p-5 rounded-2xl bg-light-text-Primary">
                    <canvas id="myLineChart" width="2000" height="450" class="w-full h-full"></canvas>
                </div>

            </div>
        </div>

        </div>
    </div>
@endsection



