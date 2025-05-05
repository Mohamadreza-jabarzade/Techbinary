<!DOCTYPE html>
<html lang="fa" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>@yield('title', 'Techbinary')</title>
</head>

<body dir="rtl">
<div class="h-[100svh] w-full flex flex-col md:flex-row">
    <div class="auth-right">
        <img src="/Logo.png" alt="TechBinary" class="w-32 md:w-36 lg:w-44  md:pb-10">
        <h2 class="text-2xl text-center text-light-text-Primary hidden md:block">
            @yield('topText' , 'دنیای تکنولوژی رو با ما کشف کن.')
        </h2>
        <span class="text-base text-center text-light-text-soft hidden md:block">
            @yield('subText', 'وارد شو و جدیدترین مطالب دنیای تکنولوژی رو از دست نده!')
        </span>
    </div>
    <aside class="auth-aside">
        @yield('form')
        @yield('customScripts')
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        @include('layouts.auth.footer')

