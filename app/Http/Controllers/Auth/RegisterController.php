<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
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

        //Манипуляции с загрузкой картинки
        $file_extention = $data['logo']->getClientOriginalExtension();
        $file_name = time().rand(99,999).'logo.'.$file_extention;
        $file_path = $data['logo']->move(public_path().'/users/logo',$file_name);

        $db_path = '/users/logo/';
        $db_path .= $file_name;
        //dd($db_path);

        //Генерация пароля
        $pass = Str::random(8);
        //dd($pass);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'reg_code' => $data['reg_code'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'contact_name' => $data['contact_name'],
            'password' => Hash::make($pass),
            'password_unveil' => $pass,
            'status' => $data['status'],
            'role' => $data['role'],
            'country' => $data['country'],
            'city' => $data['city'],
            'messenger' => $data['messenger'],
            'activity' => $data['activity'],
            'work_activity' => $data['work_activity'],
            'logo' => $db_path,
        ]);
    }



}