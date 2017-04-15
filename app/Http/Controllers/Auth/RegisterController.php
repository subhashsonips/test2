<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/test';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest');
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
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        //echo $data['password']; die();
        //die();
        //print_r($data);
        //die();
        $users=User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'duplicate_pass'=>$data['password'],
        ]);

        
           /*Mail::send('emails.welcome', $data, function($message) use ($data)
            {
                $message->from('manjinder.imenso@gmail.com', "OCTB");
                $message->subject("Welcome to Impactify");
                $message->to($data['email']);
            });*/
           
           //header('location:');
      return ($users);

    }
}