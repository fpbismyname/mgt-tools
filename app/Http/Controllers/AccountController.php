<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function auth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $creds = $request->only('email', 'password');

        $user = Account::where('email', $creds['email'])->first();

        if (!$user || !Hash::check($creds['password'], $user->password)){
            return redirect()->back()->withInput()->with('alertMessage', ['Login Failed','Unable to Login, Invalid Credentials !', 'error']);
        }

        Auth::guard('mgt_guard')->login($user);

        return redirect()->route('dashboard');
    }

    public function endauth(){
        Auth::guard('mgt_guard')->logout();
        return redirect()->route('login');
    }
}
