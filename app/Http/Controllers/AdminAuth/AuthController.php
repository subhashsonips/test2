<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use App\User;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;


class AuthController extends Controller

{


    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    use  ThrottlesLogins;

    protected $redirectTo = '/';


    /**

     * Create a new authentication controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        return Validator::make($data, [

            'email' => 'required|email|max:255|unique:users',

            'password' => 'required|confirmed|min:6',

        ]);

    }


    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return User

     */

    protected function create(array $data)

    {

        return Admin::create([


            'email' => $data['email'],

            'password' => bcrypt($data['password']),

        ]);

    }


    public function adminLogin()
    {
        return view('admin.adminLogin');
    }

    

    public function adminLoginPost(Request $request)

    {
           
        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        { 
            $user = auth()->guard('admin')->user();
            //print_r($user);
            //die();
            //dd($user);
            return redirect('/admin/adminDashboard');
        }
        else
        {
            return back()->with('error','your username and password are wrong.');
        }
    }
}