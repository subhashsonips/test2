<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
class TeamsController extends Controller
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
     $allMember =  Team::all();
     return view('team.index',['allMember' => $allMember]);
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
            'name' => 'required',
            'email' => 'required',
            'skype_id' => 'required',
            ];
        $this->validate($request,$rules);
        $html = '';
        if(Team::create($request->all()))
        {
        $html = '<li><a href="#"><span class="sml"><strong>'. $request->designation .'</strong></span><br>'. $request->name .'</a></li>';
        $response['html'] = $html;
         $response['status'] = "Y";
        }
        else {
            $response['html'] = $html;
            $response['status'] = "N";
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
        $memberData = Team::find($id);    
     
      return view('team.show',['memberData'=> $memberData]);

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
