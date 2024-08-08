<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    protected $redirectTo = '/admin/login';

    /**
     * @return View
     */
    public function login(): View
    {
        return view('admin.auth.login');
    }

    /**
     * @param AdminAuthRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(AdminAuthRequest $request)
    {
        $field = $request->validated();
        $user = User::where('email', $field['email'])->first();
        if ($user) {
            if (password_verify($field['password'], $user->password)) {
                auth()->guard('admin')->login($user);
                return redirect()->route('admin.index');
            } else {
                return back()->with('error', __('İstifadəçi adı ve ya şifre yanlışdır.'));
            }
        } else {
            return back()->with('error', __('İstifadəçi adı ve ya şifre yanlışdır.'));
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();

        return redirect(route('admin.login'));
    }
}
