<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUser;


class ProjectUserController extends Controller
{
    public function store(Request $request){
        $project_user = new ProjectUser();
        $project_user->project_id = $request->input('project_id');
        $project_user->user_id = $request->input('user_id');
        $project_user->level_id = $request->input('level_id');
        
        
        if($project_user->level_id){
            
            $project_user->save();
            return back();
        }


        return back()->with('notification','Debe añadir un nivel al proyecto.');
       

    }

    public function delete($id){
        ProjectUser::find($id)->delete();
        return back();
    }
}
