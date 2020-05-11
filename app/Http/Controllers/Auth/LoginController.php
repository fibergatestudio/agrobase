<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated()
    {
        $user = auth()->user();

        if($user->role != 'admin'){
            $now = Carbon::today()->toDateString();
            $exp_date = $user->expiry_date;
            if($now >= $exp_date){
                $user->status = 'expired';
            }
            //$exp_date = Carbon::createFromFormat('m/d/Y', $user->expiry_date)->format('Y-m-d')->toDateString();
            //dd($exp_date);
            //dd($user->expiry_date);
        }

        $user->updated_at = Carbon::now();
        $user->save();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
