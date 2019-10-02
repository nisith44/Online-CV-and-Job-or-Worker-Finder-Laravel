<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use\App\User;
use\App\skill;
use\App\Personalinfo;
use\App\Eduinfo;
use\App\Proinfo;
use\App\Project;
use\App\Work;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function update(Request $r){
        $id = Auth::id();
        $user=User::find($id);

        if(isset($r->img) && $r->img->getClientOriginalName()){
            $ext=$r->img->getClientOriginalExtension();
            $file_name=date('YmdHis').rand(1,999999).'.'.$ext;
            $r->img->storeAs('public/propics',$file_name);
        }
        else{
            if(!$user->propic){
                $file_name='';
            }
            else{
                $file_name=$user->propic;
            }
        }
        
        
        $user->tel=$r->tel;        
        $user->address=$r->address;
        $user->full_name=$r->fullname;
        $user->propic=$file_name;
        $user->save();

        $skills = DB::select('select * from skills where username = ?', [$user->name]);
        
        return redirect()->route('edit-profile');

    }



    public function index($username){
        $user=User::query()->where('name',$username)->first();
        if(Auth::check() ){
            if($username!=Auth::user()->name){
            $user->pageviews=$user->pageviews+1;
            $user->save();
            }
        }else{
            $user->pageviews=$user->pageviews+1;
            $user->save();
        }

        $skills = DB::select('select * from skills where username = ?', [$user->name]);

        $pinfo = DB::select('select * from personalinfos where user_id = ?', [$user->id]);
        $eduinfo = DB::select('select * from eduinfos where user_id = ?', [$user->id]);
        $proinfo = DB::select('select * from proinfos where user_id = ?', [$user->id]);
        $projectinfo = DB::select('select * from projects where user_id = ?', [$user->id]);
        $work = DB::select('select * from works where user_id = ?', [$user->id]);
        
        return view('home',['userdata'=>$user,'skills'=>$skills,'personalinfos'=>$pinfo,'eduinfos'=>$eduinfo,'proinfos'=>$proinfo,'projects'=>$projectinfo,'works'=>$work]);
    }

    public function editpageindex(){
        $id = Auth::id();
        $user=User::find($id);
        $skills = DB::select('select * from skills where username = ?', [$user->name]);
        $personalinfo = DB::select('select * from personalinfos where user_id = ?', [$id]);
        $eduinfo = DB::select('select * from eduinfos where user_id = ?', [$id]);
        $proinfo = DB::select('select * from proinfos where user_id = ?', [$id]);
        $projectinfo = DB::select('select * from projects where user_id = ?', [$id]);
        $work = DB::select('select * from works where user_id = ?', [$id]);
        return view('edit-profile',['userdata'=>$user,'skills'=>$skills,'personalinfos'=>$personalinfo,'eduinfos'=>$eduinfo,'proinfos'=>$proinfo,'projects'=>$projectinfo,'works'=>$work]);
    }

    public function addskill(Request $r){
        $skills=new skill;
        
        $user = Auth::user();
        $username=$user->name;
        $skills->username=$username;
        $skills->skill=$r->skill;
        $skills->save();

        return redirect()->route('edit-profile');
        
    }

    public function delskill($id){
        $skill=skill::find($id);
        $skill->delete();
        return redirect()->route('edit-profile');
    }

    public function delpersonalinfo($id){
        $pinfo=Personalinfo::find($id);
        $pinfo->delete();
        return redirect()->route('edit-profile');
    }

    public function addpinfo(Request $r){
        $pinfo=new Personalinfo;
        
        $id = Auth::id();
        $pinfo->user_id=$id;
        $pinfo->title=$r->title;
        //$pinfo->description=$r->description;
        $pinfo->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $pinfo->save();

        return redirect()->route('edit-profile');
        
    }

    public function deleduinfo($id){
        $pinfo=Eduinfo::find($id);
        $pinfo->delete();
        return redirect()->route('edit-profile');
    }

    public function addeduinfo(Request $r){
        $eduinfo=new Eduinfo;
        
        $id = Auth::id();
        $eduinfo->user_id=$id;
        $eduinfo->title=$r->title;
        $eduinfo->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $eduinfo->save();

        return redirect()->route('edit-profile');
        
    }

    public function editpinfo(Request $r){
        $id=$r->id;
        $pinfo=Personalinfo::find($id);

        $pinfo->title=$r->title;
        $pinfo->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $pinfo->save();

        return redirect()->route('edit-profile');
        
    }

    public function editeduinfo(Request $r){
        $id=$r->id;
        $eduinfo=Eduinfo::find($id);

        $eduinfo->title=$r->title;
        $eduinfo->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $eduinfo->save();

        return redirect()->route('edit-profile');
        
    }

    public function delproinfo($id){
        $proinfo=Proinfo::find($id);
        $proinfo->delete();
        return redirect()->route('edit-profile');
    }

    public function addproinfo(Request $r){
        $proinfo=new Proinfo;
        
        $id = Auth::id();
        $proinfo->user_id=$id;
        $proinfo->title=$r->title;
        $proinfo->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $proinfo->save();

        return redirect()->route('edit-profile');
        
    }    

    public function editproinfo(Request $r){
        $id=$r->id;
        $proinfo=Proinfo::find($id);

        $proinfo->title=$r->title;
        $proinfo->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $proinfo->save();

        return redirect()->route('edit-profile');
        
    }

    public function addproject(Request $r){
        $project=new project;
        
        $id = Auth::id();
        $project->user_id=$id;
        $project->title=$r->title;
        $project->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $project->url=$r->url;
        $project->save();

        return redirect()->route('edit-profile');
        
    }

    public function editproject(Request $r){
        $id=$r->id;
        $project=Project::find($id);

        $project->title=$r->title;
        $project->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $project->url=$r->url;
        $project->save();

        return redirect()->route('edit-profile');
        
    }

    public function delproject($id){
        $project=project::find($id);
        $project->delete();
        return redirect()->route('edit-profile');
    }

    public function delwork($id){
        $work=Work::find($id);
        $work->delete();
        return redirect()->route('edit-profile');
    }

    public function addwork(Request $r){
        $work=new Work;
        
        $id = Auth::id();
        $work->user_id=$id;
        $work->title=$r->title;
        $work->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $work->save();

        return redirect()->route('edit-profile');
        
    }

    public function editwork(Request $r){
        $id=$r->id;
        $work=Work::find($id);

        $work->title=$r->title;
        $work->description=nl2br(htmlentities($r->description, ENT_QUOTES, 'UTF-8'));
        $work->save();

        return redirect()->route('edit-profile');
        
    }




}