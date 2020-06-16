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

        $all_info = $request->all();
        $userId = Auth::id();
        //dd($all_info);

        $new_advert = new Adverts();
        $new_advert->creator_id = $userId;
        $new_advert->short_text = $all_info['short_text'];
        $new_advert->company = $all_info['company'];
        $new_advert->trading_item = $all_info['trading_item'];
        $new_advert->sale_place = $all_info['sale_place'];
        $new_advert->sale_type = $all_info['sale_type'];
        $new_advert->price = $all_info['price'];
        $new_advert->save();

        //dd($new_advert);

        return redirect()->back()->with('message_success', 'Спасибо, ваше объявление отправлено на модерацию.');

        //return redirect('/');
    }
}
