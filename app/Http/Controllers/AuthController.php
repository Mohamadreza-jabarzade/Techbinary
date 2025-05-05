<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountForm;
use App\Http\Requests\loginFormRequest;
use App\Http\Requests\registerForm;
use App\Http\Requests\verifyCodeForm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(loginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // جلوگیری از session fixation
            return redirect()->intended(route('showHome'));
        }

        return back()->withErrors([
            'email' => 'اطلاعات وارد شده صحیح نمی‌باشد.',
        ]);
    }
    public function createAccount(CreateAccountForm $createAccountForm)
    {
        User::create([
            'username' => $createAccountForm->username,
            'password' => bcrypt(request('password')),
            'email' => session('email_for_verification'),
            'email_verified_at' => Carbon::now(),
        ]);
        return redirect()->route('showHome')->with('message', 'Your account has been created.');
    }
    public function showCreateAccount()
    {
        return view('auth.registerEnd');
    }
    public function resendVerifyCode(Request $request)
    {
        $email = $request->input('email');
        $code = rand(100000, 999999);

        Mail::raw("Your verification code is: $code", function ($message) use ($email) {
            $message->to($email)
                ->subject("Your verification code");
        });

        session([
            'verification_code' => $code,
            'email_for_verification' => $request->email,
        ]);

        return response()->json("Verification code resent to $email successfully!");
    }
    public function showRegisterEmailCheck()
    {
        return view('auth.registerEmail');
    }
    public function verifyCode(verifyCodeForm $request)
    {
        $email = session('email_for_verification');
        $code = request("code1").request("code2").request("code3").request("code4").request("code5").request("code6");
        if (session('verification_code') == $code){
            return redirect()->route('showCreateAccount');
        }else{
            return redirect()->route('showRegisterEmailCheck')->with('error','verification code is wrong');
        }

    }
    public function registerEmailCheck(registerForm $request){
        $code = rand(100000, 999999);

        Mail::raw("Your verification code is: $code", function ($message) use ($request) {
            $message->to($request->email)
                ->subject("Your verification code");
        });

        session([
            'verification_code' => $code,
            'email_for_verification' => $request->email,
        ]);

        return redirect()->route('showVerifyForm');
    }
    public function showVerifyForm()
    {
        $verification_code = session('verification_code');
        return view('auth.registerEmail',['verification_code' => $verification_code]);
    }


}
