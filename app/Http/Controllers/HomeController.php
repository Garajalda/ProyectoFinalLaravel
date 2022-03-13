<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\ProjectUser;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $my_incidents = null;
        $incidencias_sin_asignar = null;
        if($user->is_support){
            $my_incidents = Incident::where('project_id',auth()->user()->selected_project_id)->where('support_id',$user->id)->get();
            
            $projectUser = ProjectUser::where('project_id',auth()->user()->selected_project_id)->where('user_id', $user->id)->first();
           
            $incidencias_sin_asignar = Incident::where('support_id', null)->where('level_id', $projectUser->level_id)->get();
        }
        
        $incidencias_roportadas_por_mi = Incident::where('client_id', auth()->user()->id)->where('project_id',auth()->user()->selected_project_id)->get();

        return view('home')->with(compact('my_incidents','incidencias_sin_asignar','incidencias_roportadas_por_mi'));
    }

    public function selectProject($id)
    {
        $user = auth()->user();
        $user->selected_project_id = $id;
        $user->save();
        return back();
    }

    
}
