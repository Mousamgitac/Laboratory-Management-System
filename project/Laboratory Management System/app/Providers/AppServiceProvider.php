<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use DB;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      Schema::defaultStringLength(191);
      view()->composer('*', function($view){
        if(Auth::user()){
        $modules = DB::table('lab_modules')
        ->join('lab_module_user','lab_module_user.lab_module_id','=','lab_modules.id')
        ->where('lab_module_user.user_id','=',Auth::user()->id)->get();
        $users = DB::table('users')
        ->join('department_user','department_user.user_id','=','users.id')
        ->join('departments','departments.id','=','department_user.department_id')
        ->join('access_level_user','access_level_user.user_id','=','users.id')
        ->join('access_levels','access_levels.id','=','access_level_user.access_level_id')
        ->join('lab_module_user','lab_module_user.user_id','=','users.id')
        ->join('lab_modules','lab_modules.id','=','lab_module_user.lab_module_id')
        ->where('users.id','=','Auth::user()->id')
        ->get();
        $subs = DB::table('sub_modules')
        ->join('lab_modules','lab_modules.id','=','sub_modules.module_id')
        ->get();
            View::share('users', $users);
            View::share('modules',$modules);
            View::share('subs',$subs);
        }
    });  
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
