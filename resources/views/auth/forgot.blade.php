@extends('layouts.auth.auth')
@section('title', 'فراموشی رمز عبور')
@section('subText','رمزت رو فراموش کردی؟ نگران نباش! با چند کلیک، رمز جدید بساز و به دنیای فناوری برگرد!')
@section('form')
    <form action="{{route('forgotEmailCheck')}}" method="post" class="md:flex-1 w-4/5 flex flex-col gap-3 justify-center">
        @csrf
        <h1 class="text-my-second text-lg font-medium">تغییر رمز عبور</h1>
        <input class="auth-input text-left" name="email" type="email" placeholder="ایمیل خود را وارد کنید" required>
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <div class="w-full flex justify-end">
            <button type="submit" class="auth-btn"><span>ادامه</span><i class="fa fa-angle-left absolute left-3"></i></button>
        </div>
    </form>
@endsection

