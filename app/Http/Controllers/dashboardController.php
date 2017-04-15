<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Crypt;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
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
    public function index($id="")
    {
         
         return view('dashboard.index');

    }

    public function success($id="")
    {
         
         return view('dashboard.success');

    }
    
}
