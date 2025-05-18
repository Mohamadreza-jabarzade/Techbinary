@extends('layouts.auth.auth')
@section('title', 'ورود')
@section('form')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('login')}}" method="post" class="md:flex-1 w-4/5 flex flex-col gap-3 justify-center">
        @csrf
        @if(request('next'))
            <input type="hidden" name="next" value="{{ request('next') }}">
        @endif
        <h1 class="text-my-second text-lg font-medium">ورود به حساب کاربری</h1>
        <input class="auth-input" type="email" name="email" placeholder="ایمیل خود را وارد کنید" required>
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <input class="auth-input" type="password" name="password" placeholder="رمز عبور خود را وارد کنید" required>
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <div class="w-full flex justify-end">
            <button class="auth-btn"><span>ورود</span><i class="fa fa-angle-left absolute left-3"></i></button>
        </div>
        <a href="{{route('showForgot') }}" class="text-center text-sm mt-3 text-dark-text-soft opacity-70">فراموشی رمز عبور</a>
        <a href="{{route('showRegister')}}" class="text-center text-sm mt-3 text-dark-text-soft opacity-70">عضو نیستید؟ ثبت نام کنید</a>
    </form>
@endsection

