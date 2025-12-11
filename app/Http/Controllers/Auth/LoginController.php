<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CenterManager;
use App\Models\User; // student model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 1️⃣ Check Admin
        $admin = Admin::where('email', $data['email'])->first();
        if ($admin && Hash::check($data['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }

        // 2️⃣ Check Center Manager
        $manager = CenterManager::where('email', $data['email'])->first();
        if ($manager && Hash::check($data['password'], $manager->password)) {
            Auth::guard('manager')->login($manager);
            return redirect()->route('manager.dashboard');
        }

        // 3️⃣ Check Student (User table)
        $student = User::where('email', $data['email'])->first();
        if ($student && Hash::check($data['password'], $student->password)) {
            Auth::guard('web')->login($student); // default guard
            return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('manager')->check()) {
            Auth::guard('manager')->logout();
        } elseif (Auth::guard('web')->check()) { // student logout
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
