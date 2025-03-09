<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\Admin;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin) {
            $admin->sendPasswordResetNotification(Password::broker('admin')->createToken($admin));
            return back()->with('status', 'パスワードリセットリンクを送信しました。');
        }

        return back()->withErrors(['email' => 'そのメールアドレスは登録されていません。']);
    }
}
