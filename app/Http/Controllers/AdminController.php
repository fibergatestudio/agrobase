<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AdminController extends Controller
{
    public function users_index(){

        $users = DB::table('users')->paginate(10);

        return view('admin.users',[
            'users' => $users,
        ]);
    }


    //Страница редактирование пользователя
    public function user_edit($user_id){

        $user_info = DB::table('users')->where('id', $user_id)->first();

        return view('admin.user_edit', compact('user_info'));
    }

    //Применение изменения пользователя
    public function user_edit_apply(Request $request){

        $user_id = $request->user_id;
        $new_role = $request->role;
        $new_status = $request->status;

        DB::table('users')
            ->where('id', '=', $user_id)
            ->update([
                'role' => $new_role,
                'status' => $new_status
                ]);


        return redirect()->back()->with('message_success', 'Пользователь изменен!');
    }

    public function user_delete_apply($user_id){

        //dd($user_id);

        DB::table('users')->where('id', $user_id)->delete();

        return redirect()->back()->with('message_delete', 'Пользователь удален!');
    }
}
