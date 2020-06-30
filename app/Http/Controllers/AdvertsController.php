<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Adverts;

class AdvertsController extends Controller
{
    //


    public function view_advert($advert_id){

        $advert_info = DB::table('adverts')->where('id', $advert_id)->first();

        $date = $advert_info->created_at;
        $beatiful_date = Carbon::parse($date)->format('j m Y h:i:s A');


        return view('adverts.single_advert', compact('advert_id', 'advert_info', 'beatiful_date') );
    }

    public function create_advert(){


        return view('adverts.create_advert');
    }

    public function create_advert_apply(Request $request){


        //Заносим все возможные значения продукта в аррей
        $values = ['prod', 'prod_masl', 'prod_bob', 'prod_cult', 'prod_zern',
        'prod_pererab', 'prod_muka', 'prod_otrub', 'prod_jmih', 
        'prod_shrot', 'prod_krupa', 'prod_maslo', 'prod_drev'];
        //Пустой аррей с "правилными" значениями продукта
        $good_values = [];
        //Перебираем и проверяем значения на сповпадения
        foreach($values as $value){

            if($request[$value] == "Выберите"){
                unset($request[$value]);
            } else {
                //Заносим правильно значение в аррей
                array_push($good_values, $value);
            }

        }

        //Формируем полный продукт
        $prod_full_name = '';
        $arr_lenght = count($good_values);
        $length = 1;
        // Совмещаем имя 
        foreach($good_values as $g_val){

            $prod_full_name .= $request[$g_val];

            if($length < $arr_lenght){
                $prod_full_name .= ' > ';
            }
           
            $length++;
        }
        if($request['other'] != NULL){
            $prod_full_name .= ' > ';
            $prod_full_name .= $request['other'];
        }

        //dd($prod_full_name);

        $all_info = $request->all();
        $userId = Auth::id();

        $images = array();
        if($files = $request->file('prod_photo')){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time().rand(99,999).'advert.'.$name;
                $file->move(public_path().'/adverts',$filename);

                $db_path = '/adverts/';
                $db_path .= $filename;
                $images[]=$db_path;
            }
        }

        //Добавляем обьявление в базу
        $new_advert = new Adverts();
        $new_advert->creator_id = $userId;
        $new_advert->short_text = $all_info['short_text'];
        $new_advert->company = $all_info['company'];
        $new_advert->trading_item = "NULL";
        $new_advert->sale_place = $all_info['sale_place'];
        $new_advert->sale_type = $all_info['sale_type'];
        $new_advert->price = $all_info['price'];

        $new_advert->action = $all_info['action'];
        $new_advert->prod = $prod_full_name;
        $new_advert->amount = $all_info['amount'];
        $new_advert->weight = $all_info['weight'];
        $new_advert->delivery = $all_info['delivery'];
        $new_advert->currency = $all_info['currency'];
        $new_advert->prod_descr = $all_info['prod_descr'];
        $new_advert->prod_photo = implode("|",$images);
        //dd($new_advert);

        $new_advert->save();

        //dd($new_advert);

        return redirect()->back()->with('message_success', 'Спасибо, ваше объявление отправлено на модерацию.');

        //return redirect('/');
    }
}
