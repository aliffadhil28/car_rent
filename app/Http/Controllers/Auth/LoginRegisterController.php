<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'admin.dashboard'
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with(['success' => 'Selamat Datang di LocalGems']);;
        }else{
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required',
            'location' => 'required|min:10',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'location' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $data = $request->only('email','password');
        Auth::attempt($data);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')->with(['success' => 'Selamat Datang di LocalGems']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');
    }
}
