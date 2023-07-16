<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // register
    public function create()
    {
        return view('users.register');
    }


    public function register(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'address' => ['required'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);


        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');
    }

    // logout

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/',)->with('message', 'You have been logged out!');

    }

    public function login()
    {
        return view('users.login');

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function viewProfile() {
        return view('users.profile');
    }

    public function editProfile() {
        return view ('users.edit');
    }

    public function updateProfile(Request $request) {
        $credentials = $request->validate([
            'address' => ['required'],
            'password' => ['required', 'min:6'],
        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        // $user_form = $request->all();
        $user = Auth::user();
        unset($credentials['_token']);
        $user->fill($credentials)->save();
        return redirect('/profile');
    }
}

