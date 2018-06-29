<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\controller;
use App\Registration;
use App\Province;
use App\District;
use App\LocalLevel;
use App\zone;
use Image;
use DB;
use Carbon\Carbon;
use App\menu;
use App\LabModule;
use View;

class PatientRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$now = new \DateTime();
        //$todaysdate = date('d M Y',$now);
        $patientRegistrations = DB::table('registrations')
        ->leftjoin('provinces','provinces.province_id','=','registrations.province')
        ->leftjoin('districts','districts.district_id','=','registrations.district')
        ->whereDate('regdate', Carbon::today())
        ->get();
       
        
        return view('patientRegistration.index')->withPatientRegistrations($patientRegistrations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $provinces = Province::all();
        $zones = Zone::all();
        return view('patientRegistration.create')->withProvinces($provinces);
    }

     public function findDistrictName(Request $request){

        
        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=District::select('district_name','district_id')->where('province_id',$request->province_id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }

      public function findLocalLevelName(Request $request){

        
        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=LocalLevel::select('localLevel_name','localLevel_id')->where('district_id',$request->district_id)->take(800)->get();
        return response()->json($data);//then sent this data to ajax success
        }
       public function search(Request $request){

        $search = $request->search;
        $patientRegistrations = DB::table('registrations')
        ->where('fname' ,'like','%' .$search. '%')
        ->orWhere('lab_id' ,'like','%' .$search. '%')
        ->orWhere('lname' ,'like','%' .$search. '%')
        ->orWhere('sex' ,'like','%' .$search. '%')
        ->get();
 
        return view('patientRegistration.index')->withPatientRegistrations($patientRegistrations);
        }

        public function searchdate(Request $request){

         $from = $request->from;
         $to = $request->to;
         $patientRegistrations = DB::table('registrations')
         ->whereBetween('regdate', [$from,$to])
         ->get();
         $modules = LabModule::all();


        return view('patientRegistration.index')->withPatientRegistrations($patientRegistrations)->withModules($modules);
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
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'date' => 'required|max:255',
                'sex' => 'required|max:255',
                'address' => 'required|max:255',
                'province' => 'required|max:255',
                'districts' => 'required|max:255',
                'localLevel' => 'required|max:255',
                'contactNo' => 'required|max:255',
                'mobNo' => 'required|max:255',
                'email' => 'required|max:255',
                'patientHistory' => 'required|max:255',
                'diagnosis' => 'required|max:255',
                'previousTest' => 'required|max:255',
                'previousHospital' => 'required|max:255',
                'doctor' => 'required|max:255',
            ));
        // store in the database
        $patientRegistration = new Registration;

        $patientRegistration->fname = $request->fname;
        $patientRegistration->lname = $request->lname;
        $patientRegistration->date = $request->date;
        $patientRegistration->sex = $request->sex;
        $patientRegistration->address = $request->address;
        $patientRegistration->province = $request->province;
        $patientRegistration->district = $request->districts;
        $patientRegistration->mun = $request->localLevel;
        $patientRegistration->contactNo = $request->contactNo;
        $patientRegistration->mobNo = $request->mobNo;
        $patientRegistration->email = $request->email;        
        $patientRegistration->patientHistory = $request->patientHistory;
        $patientRegistration->diagnosis = $request->diagnosis;
        $patientRegistration->previousTest = $request->previousTest;
        $patientRegistration->previousHospital = $request->previousHospital;
        $patientRegistration->doctor = $request->doctor;
        $patientRegistration->regdate = $request->regDate;

        if($request->hasFile('featured_image')){
         $image = $request->file('featured_image');
         $filename = time() .'.' . $image->getClientOriginalExtension();
         $location =public_path('images/' .$filename);
         Image::make($image)->resize(800,400)->save($location);

         $patientRegistration->image = $filename;
        }

        $patientRegistration->save();

      //  Session::flash('success', 'Patient has been successfully registered!');

       // return redirect()->route('patientRegistration.show', $patientRegistration->id);
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
