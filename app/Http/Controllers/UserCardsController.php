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
}
