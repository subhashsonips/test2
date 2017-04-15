<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Ngo;
use App\Organization_sectors;
//use App\Http\Controllers\Controller;
//use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ErrorController extends Controller
{
    public function __construct()
    {
       
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      return view('error.index');
    }
}