<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamWork;
use App\Project;
use App\Team;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class TeamWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\TeamMiddleware');    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata = User::find(Auth::id())->team;    
        $teamId = $userdata['id']; 
        $work_prj = DB::select('select * from projects where FIND_IN_SET('. $teamId . ',team_member)'); 
        foreach ($work_prj as $key => $prj) {
            $prjId[] = $prj->id; 
        }       
        // $alltask  =  Project::with('tasks')->find([1,2])->where('status',0); 

        $alltask =  Task::whereIn('prj_id',$prjId)->where('status',0)->orderby('end_date')->get();        
        return view('team-work.index',['work_prj' => $work_prj, 'alltask' => $alltask, 'teamId' => $teamId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $work = new TeamWork;
     $work->working_date = $request->working_date;
     $work->project_id = $request->project_id;
     $work->task_id = $request->task_id; 
     $work->team_id = $request->team_id;
     $work->working_hour = $request->working_hour;
     $work->task_completed = $request->task_completed ; 
     if($work->save())
     {
        $response['status'] = 'Y';   
     } else { $response['status'] = 'N'; }     
     return json_encode($response);
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
