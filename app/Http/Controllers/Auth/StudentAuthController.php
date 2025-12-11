<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.student-register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        // Create student user
        $user = User::create($data);

        // Login student
        Auth::login($user);

        return redirect()->route('home')->with('success', 'تم إنشاء الحساب بنجاح 🎉');
    }

    public function showLoginForm()
    {
        // Students do NOT have separate login page → redirect to shared login
        return redirect()->route('login.form');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('home');
        }

        return back()->with('error', 'بيانات تسجيل الدخول غير صحيحة');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // After logout, student goes to shared login page
        return redirect()->route('login.form');
    }
}
