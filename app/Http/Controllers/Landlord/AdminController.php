<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('landlord.super-admin.auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_super_admin) {
            return redirect('/super-admin/dashboard');
        }
    }

    public function username()
	{
		return 'username';
	}


    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/super-admin');
    }
}
