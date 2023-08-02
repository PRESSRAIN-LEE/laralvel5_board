<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
<<<<<<< HEAD
=======
            'name_en' => 'required|string|max:255',
            'phone1' => 'required|string|max:3',
            'phone2' => 'required|string|max:4',
            'phone3' => 'required|string|max:4',
            //'phone' => 'required|string|max:15',
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
<<<<<<< HEAD
=======
            'name_en' => $data['name_en'],
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'],
            'phone3' => $data['phone3'],
            //'phone' => $data['phone3'],
            'phone' => $data['phone1'] . "-" . $data['phone2'] . "-" . $data['phone3'],
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
