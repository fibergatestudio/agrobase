<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserCardsController extends Controller
{
    //


    public function index(){

        $users = DB::table('users')->where('role', 'user')->get();


        return view('user_cards.index', compact('users'));
    }


    public function single_card($user_id){

        $user = DB::table('users')->where('id', $user_id)->first();


        return view('user_cards.single_card', compact('user'));
    }
}
