<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LabModule;
use App\Department;
use App\UserInfo;
use App\Access_level;
use App\User;
use Auth;
use View;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('home');
    }
}
