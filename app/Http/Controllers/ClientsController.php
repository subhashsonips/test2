<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
class ClientsController extends Controller
{
    //
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
		$clients = Client::all();
       return view('clients.index',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
    
        
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
        		'name' => 'required | max:255',
        		'email' => 'required',
				'skype_id' => 'required'
        ];
        $this->validate($request, $rules);
        $req = new Client;
        $req->name =  $request->name;
        $req->skype_id =  $request->skype_id;
        $req->website = $request->website;
        $req->company = $request->company;
		$req->email =  $request->email;
		$req->country = $request->country;
		
		  if($req->save())
		{
			$html = '<li><a href="#"><span class="sml"><strong>'.$request->name .'</strong></span><br>'.$request->company .'</a></li>';
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
	 $clientData = Client::find($id);
	 return view('clients.show',['client' => $clientData]);	
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
        $client = Client::find($id);
		$client->name =  $request->name;
        $client->skype_id =  $request->skype_id;
        $client->website = $request->website;
        $client->company = $request->company;
		$client->email =  $request->email;
		$client->country = $request->country;
		$client->save();
		$clientData = Client::find($id);
		return view('clients.show',['client' => $clientData]);	
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
