<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rules = ['task_name' => 'required',
                   'prj_id' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required']; 
        $html = '';         
      // $task = Task::create($request->all());
    foreach ($request->task as $key => $t) {
        // $this->validate($t, $rules);  
         $ntask = new Task;
         $ntask->task_name = $t['task_name'];
          $ntask->prj_id = $request->prj_id; 
          $ntask->start_date = $t['start_date'];
          $ntask->end_date = $t['end_date']; 
          $ntask->status = 0;
          $ntask->save();
          $html .= '<tr><td><div class="checkbox"><label><input type="checkbox" value=""><span class="cr"><i class="cr-icon fa fa-check"></i></span></label></div></td><td><a href="#editTask" data-toggle="modal" class="blackLink">'.$t['task_name'] .'</a></td><td>'. $t['start_date'] . ' - ' . $t['end_date'] . '</td><td><a href="#" data-toggle="tooltip" title="" data-original-title="In-progress"><span class="circle greenbg"></span> </a></td></tr>';
         }
      
      $response['html'] = $html;
      $response['status'] = "Y";

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
        $task = Task::find($id);

        if($request->status == 'true')
        {
          $task->status = 1;
        }
        else if($request->status == 'false')
        {
          $task->status = 0;
        }
        $task->completed_at = date('Y-m-d');
        $task->save();
       
        $taskDetail = Task::find($id);
        return view('tasks.show',['taskData' => $taskDetail]);
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
