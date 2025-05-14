@extends('layouts.auth.auth')
@section('title', 'تکمیل ثبت نام')
@section('subText','ثبت‌نام کن تا جدیدترین مطالب تکنولوژی رو از دست ندی!')
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

    <form action="{{route('CreateAccount')}}" method="post" class="md:flex-1 w-4/5 flex flex-col gap-3 justify-center">
        @csrf
        <h1 class="text-my-second text-lg font-medium">تکمیل حساب کاربری</h1>
        <input class="auth-input" type="text" name="username" placeholder="نام کاربری خود را وارد کنید" required>
        @error('username')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <input class="auth-input" type="password" name="password" placeholder="رمز عبور خود را وارد کنید" required>
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <input class="auth-input" type="password" name="password_confirmation" placeholder="رمز عبور را دوباره وارد کنید" required>
        @error('password_confirmation')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <div class="w-full flex justify-end">
            <button type="submit" class="auth-btn"><span>تکمیل</span><i class="fa fa-angle-left absolute left-3"></i></button>
        </div>
    </form>
@endsection
@section('customScripts')
    <script src="/scripts/align-inputs.js"></script>
@endsection

