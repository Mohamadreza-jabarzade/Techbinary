@extends('layouts.auth.auth')
@section('title', 'برسی ایمیل')
@section('subText','رمزت رو فراموش کردی؟ نگران نباش! با چند کلیک، رمز جدید بساز و به دنیای فناوری برگرد!')
@section('form')
    <form action="signup-end.html" method="post" class="md:flex-1 w-4/5 flex flex-col gap-3 justify-center">

        <h1 class="text-my-second text-lg font-medium">برسی صحت ایمیل</h1>
        <span class="">لطفا کد ارسال شده به <span class="text-sm font-extralight">dev.javad.mosavian@gmail.com</span> را وارد کنید</span>

        <div dir="ltr" style="text-align: center" class="flex justify-center gap-3 items-center">
            <div>
                <label for="code-1" class="sr-only">First code</label>
                <input type="text" maxlength="1" data-focus-input-init data-focus-input-next="code-2" id="code-1" class="digit-input text-center w-12 h-12 leading-[3rem]" required autocomplete="off" />
            </div>
            <div>
                <label for="code-2" class="sr-only">Second code</label>
                <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-1" data-focus-input-next="code-3" id="code-2" class="digit-input text-center w-12 h-12 leading-[3rem]" required autocomplete="off" />
            </div>
            <div>
                <label for="code-3" class="sr-only">Third code</label>
                <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-2" data-focus-input-next="code-4" id="code-3" class="digit-input text-center w-12 h-12 leading-[3rem]" required autocomplete="off" />
            </div>
            <div>
                <label for="code-4" class="sr-only">Fourth code</label>
                <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-3" data-focus-input-next="code-5" id="code-4" class="digit-input text-center w-12 h-12 leading-[3rem]" required autocomplete="off" />
            </div>
            <div>
                <label for="code-5" class="sr-only">Fifth code</label>
                <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-4" data-focus-input-next="code-6" id="code-5" class="digit-input text-center w-12 h-12 leading-[3rem]" required autocomplete="off" />
            </div>
            <div>
                <label for="code-6" class="sr-only">Sixth code</label>
                <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-5" id="code-6" class="digit-input text-center w-12 h-12 leading-[3rem]" required autocomplete="off" />
            </div>
        </div>


        <div class="w-full flex justify-end">
            <button class="auth-btn w-full"><span>ادامه</span><i class="fa fa-angle-left absolute left-3"></i></button>
        </div>
    </form>
@endsection
@section('customScripts')
    <script src="/scripts/digit-inputs.js"></script>
@endsection

