@extends('layouts.auth.auth')
@section('title', 'تایید ایمیل')
@section('subText','ثبت‌نام کن تا جدیدترین مطالب تکنولوژی رو از دست ندی!')
@section('form')
    @if(session('error'))
        {{session('error')}}
    @endisset
    {{$verification_code}}
    <form action="{{route('verifyCode')}}" method="post" class="md:flex-1 w-4/5 flex flex-col gap-3 justify-center">
        @csrf
        <h1 class="text-my-second text-lg font-medium">برسی ایمیل</h1>
        <span class="">لطفا کد ارسال شده به <span id="email" class="text-sm font-extralight">{{session('email_for_verification') ?? "" }}</span> را وارد کنید</span>

        <div dir="ltr" class="flex justify-center gap-3 items-center ">
            <div>
                <label for="code-1" class="sr-only">First code</label>
                <input type="text" maxlength="1" name="code1" data-focus-input-init data-focus-input-next="code-2" id="code-1" class="digit-input" required autocomplete="off" />
            </div>
            <div>
                <label for="code-2" class="sr-only">Second code</label>
                <input type="text" maxlength="1" name="code2" data-focus-input-init data-focus-input-prev="code-1" data-focus-input-next="code-3" id="code-2" class="digit-input" required autocomplete="off" />
            </div>
            <div>
                <label for="code-3" class="sr-only">Third code</label>
                <input type="text" maxlength="1" name="code3" data-focus-input-init data-focus-input-prev="code-2" data-focus-input-next="code-4" id="code-3" class="digit-input" required autocomplete="off" />
            </div>
            <div>
                <label for="code-4" class="sr-only">Fourth code</label>
                <input type="text" maxlength="1" name="code4" data-focus-input-init data-focus-input-prev="code-3" data-focus-input-next="code-5" id="code-4" class="digit-input" required autocomplete="off" />
            </div>
            <div>
                <label for="code-5" class="sr-only">Fifth code</label>
                <input type="text" maxlength="1" name="code5" data-focus-input-init data-focus-input-prev="code-4" data-focus-input-next="code-6" id="code-5" class="digit-input" required autocomplete="off" />
            </div>
            <div>
                <label for="code-6" class="sr-only">Sixth code</label>
                <input type="text" maxlength="1" name="code6" data-focus-input-init data-focus-input-prev="code-5" id="code-6" class="digit-input" required autocomplete="off" />
            </div>
        </div>


        <div class="w-full flex justify-end">
            <button type="submit" class="auth-btn w-full"><span>ادامه</span><i class="fa fa-angle-left absolute left-3"></i></button>
        </div>
        <a class="cursor-pointer text-center text-sm mt-3 text-dark-text-soft opacity-70" onclick="reSendCode()">ارسال دوباره کد</a>

        <a href="{{route('showRegister')}}" class="text-center text-sm mt-3 text-dark-text-soft opacity-70">تغییر ایمیل</a>
    </form>
@endsection
@section('customScripts')
    <script src="/scripts/digit-inputs.js"></script>
    <script type="text/javascript">
        function reSendCode() {
                var email = document.getElementById('email').innerHTML;
                $.ajax({
                type: "GET",
                url: "{{route('resendVerifyCode')}}",
                data: {"email": email},
                success: function(response){
                alert(response);
            },
                error: function(){
                alert("error");
            }
            });
    }
    </script>
@endsection
