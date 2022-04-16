<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function Register()
    {
        return view('signup');
    }

    public function RegisterSubmit(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);
        unset($data['retype_password']);
        $data['password'] = bcrypt($request->password);
        $data['verify_token'] = rand(50000, 500000);
        $data['active'] = 0;
        User::insert($data);

        Mail::to($data['email'])->send(new Register($data['email'], $data['verify_token']));

        return redirect('login')->with('success', 'verify email address');
    }

    public function Login()
    {
        return view('login');
    }

    public function Verify($email, $token)
    {
        $check = User::where(['email' => $email, 'verify_token' => $token])->first();

        if ($check) {
            User::where(['email' => $email])->update(['verify_token' => '', 'active' => 1]);
            return redirect('login')->with('success', 'verified email');
        } else {
            return 'something went wrong';
        }
    }

    public function LoginSubmit(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data['active'] = 1;

        if (Auth::attempt($data)) {
            return redirect('home');
        } else {
            return redirect('login')->with('error', 'Invalid Username or Password');
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function Home()
    {
        return view('home');
    }
    public function FormView()
    {
        return view('form');
    }
    public function Table()
    {
        return view('datatable');
    }
}
