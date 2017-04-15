<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project; 
use App\Client;
use App\Task;
use App\Team;
class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\AdminMiddleware');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $allclient = Client::all();
        $allproject = Project::with('client')->get();
        $team = Team::all();
        $pendingTasks =  Task::where(['prj_id'=>$allproject[0]->id,'status'=> 0])->get();
        $completedTasks =  Task::where(['prj_id'=>$allproject[0]->id,'status'=> 1])->get();
        return view('projects.index',['allclient' => $allclient, 
                                    'allproject' => $allproject,
                                    'pendingTasks' => $pendingTasks,
                                    'completedTasks' => $completedTasks,
                                    'allteam' => $team
                                   ]);
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
        $rules = [
                'prj_title' => 'required | max:255',
                'prj_type' => 'required',
                'client_id' => 'required',
                'prj_start_date' => 'required'
        ];
        $this->validate($request, $rules);
        $req = new Project;
        $req->prj_title =  $request->prj_title;
        $req->prj_type =  $request->prj_type;
        $req->client_id = $request->client_id;
        $req->prj_folder_url = $request->prj_folder_url;
        $req->prj_start_date =  $request->prj_start_date;
        $req->prj_end_date = $request->prj_end_date;
        
          if($req->save())
        {
            $html = '<li><a href="#" class="prj-list" data-id="'.$req->id .'"><span class="sml"><strong>'.$request->client_id.'</strong></span><br>'. $request->prj_title . '</a></li>';
            $response['html'] = $html;
            $response['status'] = "Y";
            
        }
        else
        {
             $response['status'] = "N";
             $response['html'] = "";
        } 
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
      $projectData = Project::find($id);
      $projectClient = Project::find($id)->client;
      $pendingTasks = Task::where(['prj_id'=>$id,'status' => 0])->get();
      $completedTasks = Task::where(['prj_id'=>$id,'status' => 1])->get();
       $team = Team::all(); 
    return view('projects.show',[
                        'projectData'=> $projectData,
                        'pendingTasks' => $pendingTasks,
                        'projectClient'=> $projectClient,
                        'allteam' => $team,
                        'completedTasks' => $completedTasks
                        ]);
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
       $prj =  Project::find($id);
       $prj->team_member = implode(',',$request->team_member);     
       if($prj->save()) {
            $response['status'] = 'Y';
            $response['html'] = '';
        }
      return json_encode($response);
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
