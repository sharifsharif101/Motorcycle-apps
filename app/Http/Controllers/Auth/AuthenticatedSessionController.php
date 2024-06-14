<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        // تحقق من حالة المستخدم
        if ($user->status == 0) {
            Auth::logout();

            return redirect()->route('login')->withErrors([
                'status' => 'لقد تم تعليق حسابك.',
            ]);
        }
     
        $request->session()->regenerate();

        return redirect()->route('profile.edit');
    }


public function destroy(Request $request): RedirectResponse
    {
        // تسجيل خروج المستخدم
        Auth::guard('web')->logout();

        // إبطال الجلسة الحالية
        $request->session()->invalidate();

        // تجديد رمز الجلسة (CSRF token)
        $request->session()->regenerateToken();

        // إعادة توجيه المستخدم إلى الصفحة الرئيسية
        return redirect('/');
    }
}