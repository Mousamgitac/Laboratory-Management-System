<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\controller;
use App\Department;
use App\UserInfo;
use App\LabModule;
use App\Access_level;
use App\Menu;
use App\User;
use View;
use Auth;
use DB;


class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    //its just a dummy data object.
    
   
    }

    

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      $accesses = Access_level::all(); 
       
      $departments = Department::all();
         
      return view('userInfo.create')->withDepartments($departments)->withaccesses($accesses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, array(
                'fullname' => 'required|max:255',
                'uname' => 'required|max:255',
                'pword' => 'required|max:255',
                'contact' => 'required|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|max:255'         
            ));
        // store in the database
        $user = new User;

       
        $user->name = $request->uname;
        $user->fullname = $request->fullname;
        $user->password = $request->pword;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->phone = $request->phone;
        

        $user->save();

        $user->departments()->sync($request->department,false);

        $user->labModules()->sync($request->labModule,false);

        $user->accesslevels()->sync($request->access,false);

        return redirect()->route('userInfo.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $user = User::find($id);  
        return view('userInfo.show')->withUser($user);      
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
