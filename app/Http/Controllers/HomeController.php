<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use\App\User;
use\App\skill;
use\App\Personalinfo;
use\App\Proinfo;
use\App\Project;
use\App\Work;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        $id = Auth::id();
        $user=User::find($id);
        //$skill=skill::query()->where('username',$user->name);
        /*
        $skills = DB::select('select * from skills where username = ?', [$user->name]);
        $personalinfo = DB::select('select * from personalinfos where user_id = ?', [$id]);
        $eduinfo = DB::select('select * from eduinfos where user_id = ?', [$id]);
        $proinfo = DB::select('select * from proinfos where user_id = ?', [$id]);
        $projectinfo = DB::select('select * from projects where user_id = ?', [$id]);
        $work = DB::select('select * from works where user_id = ?', [$id]);
        */
        
        //return view('home',['userdata'=>$user,'skills'=>$skills,'personalinfos'=>$personalinfo,'eduinfos'=>$eduinfo,'proinfos'=>$proinfo,'projects'=>$projectinfo,'works'=>$work]);

        return redirect()->route('userpage',[$user->name]);
    }
}
