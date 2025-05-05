@extends('layouts.auth.auth')
@section('title', 'ثبت نام')
@section('subText' , 'ثبت‌نام کن تا جدیدترین مطالب تکنولوژی رو از دست ندی!')
@section('form')
    <form action="{{route('RegisterEmailCheck')}}" method="post" class="md:flex-1 w-4/5 flex flex-col gap-3 justify-center">
        @csrf
        <h1 class="text-my-second text-lg font-medium">ایجاد حساب کاربری</h1>
        <input class="auth-input text-left" type="email" name="email" placeholder="ایمیل خود را وارد کنید" required>
        <div class="w-full flex justify-end">
            <button type="submit" class="auth-btn"><span>ثبت نام</span><i class="fa fa-angle-left absolute left-3"></i></button>
        </div>

        <a href="{{route('showLogin')}}" class="text-center text-sm mt-3 text-dark-text-soft opacity-70">قبلا عضو شده‌اید؟ رفتن به
            صفحه ورود</a>
    </form>
@endsection
