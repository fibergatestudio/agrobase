<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use DB;
use Carbon\Carbon;
use App\TableHeads;
use App\TableRows;
use App\Tables;
use App\Adverts;

//Удаление таблиц
use Illuminate\Support\Facades\Schema;

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

        $new_reg_code = $request->reg_code;
        $new_address = $request->address;
        $new_phone = $request->phone;
        $new_website = $request->website;
        $new_contact_name = $request->contact_name;

        //$expiry_date = $request->expiry_date;
        

        if(!empty($request->expiry_date)){
            $expiry_date = Carbon::createFromFormat('m/d/Y', $request->expiry_date)->format('Y-m-d');
            DB::table('users')
            ->where('id', '=', $user_id)
            ->update([
                'role' => $new_role,
                'status' => $new_status,
                'expiry_date' => $expiry_date,
                'reg_code' => $new_reg_code,
                'address' => $new_address,
                'phone' => $new_phone,
                'website' => $new_website,
                'contact_name' => $new_contact_name
                ]);
        } else {

            DB::table('users')
            ->where('id', '=', $user_id)
            ->update([
                'role' => $new_role,
                'status' => $new_status,
                'reg_code' => $new_reg_code,
                'address' => $new_address,
                'phone' => $new_phone,
                'website' => $new_website,
                'contact_name' => $new_contact_name
                ]);
        }

        //dd($expiry_date);


        return redirect()->back()->with('message_success', 'Пользователь изменен!');
    }

    public function user_delete_apply($user_id){

        //dd($user_id);

        DB::table('users')->where('id', $user_id)->delete();

        return redirect()->back()->with('message_delete', 'Пользователь удален!');
    }

    public function tables_control_index(){

        $tables = DB::table('table_imports')->get();

        return view('admin.admin_tables', compact('tables'));
    }

    public function table_delete_apply($table_id){

        $table_info = Tables::where('id', $table_id)->first();
        $delete_table_name = $table_info->table_name;

        Schema::dropIfExists($delete_table_name);

        $table_info_delete = Tables::where('id', $table_id)->delete();

        return redirect()->back()->with('message_delete', 'Таблица удалена!');
    }


    public function user_add(){

        return view('admin.user_add');
    }

    public function user_add_apply(Request $request){

        $test = $request->all();

        $expiry_date = Carbon::createFromFormat('m/d/Y', $request->expiry_date)->format('Y-m-d');

        //dd($test);

        $values = [
            [
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password),
                'expiry_date' => $expiry_date,
                'status' => 'confirmed',
                'role' => $request->role
            ]
        ];

        DB::table('users')->insert($values);


        return redirect('admin/users');
    }

    public function adverts_control_index(){

        $adverts = DB::table('adverts')->get();

        return view('admin.adverts', compact('adverts'));
    }

    public function adverts_control_apply($advert_id){

        Adverts::where('id', $advert_id)->update([
            'status' => 'confirmed',
        ]);


        return redirect()->back()->with('message_success', 'Обьявление потверждено!');
    }

    public function adverts_control_delete($advert_id){

        Adverts::where('id', $advert_id)->delete();

        return redirect()->back()->with('message_delete', 'Обьявление удалено!');
    }
}
