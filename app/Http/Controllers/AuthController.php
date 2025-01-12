<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        //dd($request->all()); // dump die : dung chuong trinh va in ra gia tri

        // du lieu FE gui len co dung ko, co bi loi ko, 
        // validate 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // duy nhat trong users 
            'password' => 'required|string|min:8',
        ]);

        // data clean

        // tao user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Default role for registration
        ]);

        // chuyen trang --> ve man login 

        return redirect()->route("login")->with('success', 'User registered successfully');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {

        // validate
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        // 
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return redirect()->route('dashboard')->with('success', 'Login successful');
    }

    
    public function showResetPasswordForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        // form validate
        $request->validate([
            'email' => 'required|string|email',
        ]);


        // service
        $user = User::where('email', $request->email)->first(); // lay ra ban ghi dau tien ma email === request->email
        
        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }
        
        $user->password = Hash::make('defaultPassword123'); // Default reset password


        // repository
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully');
    }



    public function showDashboard() {
        return view('dashboard');
    }


}
