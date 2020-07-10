<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use Validator;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function change_password(){

        return view('auth.change_password');
    }

    public function admin_credential_rules(array $data){
        $messages = [
            'current-password.required' => 'Пожалуйста введите текущий пароль',
            'password.required' => 'Пожалуйста введите пароль',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    }  

    public function postCredentials(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                //return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
                return redirect('/change_password')->with('message', 'Перепроверьте введенные данные!');
            }
            else
            {  
            $current_password = Auth::User()->password;           
            if(Hash::check($request_data['current-password'], $current_password))
            {           
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);
                $obj_user->save(); 
                //return "ok";
                return redirect('/change_password')->with('message_success', 'Пароль успешно изменен!');
            }
            else
            {           
                $error = array('current-password' => 'Введите верный текущий пароль');
                //return response()->json(array('error' => $error), 400);   
                return redirect('/change_password')->with('message', 'Перепроверьте введенные данные!');
            }
            }        
        }
        else
        {
            return redirect()->to('/');
        }    
    }
}
