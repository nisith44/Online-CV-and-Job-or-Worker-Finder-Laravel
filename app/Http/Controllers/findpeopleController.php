<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use\App\User;
use\App\skill;
use\App\Personalinfo;
use\App\Proinfo;

class findpeopleController extends Controller
{
    public function index(){
        return view('find-people');
    }

    public function navbarsearch(Request $r){

        $users=DB::table('users')
        ->join('personalinfos', 'users.id', '=', 'personalinfos.user_id')
        ->join('skills', 'users.name', '=', 'skills.username')
        ->where('skill','like',"%$r->key%")->get();

        $users=$users->unique('name');

        return view('find-people',['users'=>$users]);
    }
}
