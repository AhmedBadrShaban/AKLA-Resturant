<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminControllerAPI extends Controller
{
    use AuthenticatesUsers;

    // register
    /* public function create()
     {
         return view('users.register');
     } */

    public function getAdmins()
    {
        return admin::all();
    }

    public function register(Request $request)
    {

        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('admins', 'email')],
            'password' => ['required', 'min:6'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $admin = admin::create($formFields);
        $admin->generateToken();
        return response()->json(['data' => 'Admin created successfully!',
            'token' => $admin->api_token], 201);


    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, true)) {
            $admin = $this->guard()->user();
            return response()->json([
                'data' => 'Admin Logged In',
                'token' => $admin->api_token,
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // logout

    public function logout(Request $request)
    {
        $admin = Auth::guard('admin_api')->user();

        if ($admin) {
            $admin->api_token = null;
            $admin->save();
        }

        return response()->json(['data' => 'Admin logged out.']);
    }

    // See Orders

    public function getOrders() {
        return orders::all();
    }


}

