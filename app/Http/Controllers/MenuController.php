<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }

    public function faq()
    {
        return view('faq');
    }

    public function login()
    {
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]))
        {
            return redirect()->route('login')->with('error', 'Email or password is incorrect!');
        }
        else
        {
            return redirect('/home');
        }
    }

    public function ubahpass()
    {
        return view ('formpass', ['key' => '']);
    }

    public function updatepass(Request $request)
    {
        if($request->password == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/ubahpass')->with('info', 'Password Berhasil Di-ubah ^_^!');
        }
        else
        {
            return redirect('/ubahpass')->with('info', 'Password Gagal Di-ubah :(');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        return view('profile', ['user' => auth()->user(), 'key' => 'profile']);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('avatar'), $filename);
            $user->avatar = 'avatar/' . $filename;
        }

        $user->save();
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
