<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UserControllerAPI extends Controller
{
    // use AuthenticatesUsers;

    // register
    /* public function create()
     {
         return view('users.register');
     } */

    public function getUsers()
    {
        return User::all();
    }

    public function register(Request $request)
    {
        /*  $formFields = $request->validate([
              'name' => ['required'],
              'email' => ['required', 'email', Rule::unique('users', 'email')],
              'password' => ['required', 'min:6'],
              'address' => ['required'],
          ]); */

        //$formFields['password'] = bcrypt($formFields['password']);

        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'address' => ['required'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        $user->generateToken();
        return response()->json(['data' => 'User created successfully!',
            'token' => $user->api_token,
        ], 201);


    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();

            return response()->json([
                'data' => 'User Logged In',
                'token' => $user->api_token
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // logout

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.']);

    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            'data' => $user->toArray(),
        ]);
    }

    //  public function login()
    //  {
    //      return view('users.login');

    //  }


     public function viewProfile() {
          return view('users.profile');
      } 

    public function editProfile() {
         return view ('users.edit');
     } 
 public function updateProfile(Request $request)
 {
//        $credentials = $request->validate([
//            'address' => ['required'],
//            'password' => ['required', 'min:6'],
//        ]);
//        $credentials['password'] =
//       $user_form = $request->all();
//        $user = Auth::user();
//        unset($credentials['_token']);
//        $user->fill($credentials)->save();
        $user = Auth::user();
        $user->password = bcrypt($request['password']);
        $user->email = $request ['address'];
        $user->save();
        return response()->json($user, 200);

    }
}

