<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;


use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin'); //If user is not logged in then he can't access this page
    }
 


 public $sources = [
        [
            'model'      => '\\App\\Models\\Event',
            'date_field' => 'start_time',
            'field'      => 'name',
            'prefix'     => 'Event',
            'suffix'     => '',
            'route'      => 'admin.events.edit',
        ],

    ];
   


/*
    public function dashboard() {

       

       $userData = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
        //  dd($userData);
       

        return view('admin.dashboard',compact('userData'))->with('userData',$userData);
    }*/

    public function profile()
    {
        $title = 'Edit';
          $user = AdminUser::find(Auth::user()->id);
        $roles = Role::all()->pluck('title', 'id');
        $user->load('roles');

   //dd($user);

        return view('admin.profile.index', compact('user','roles'));
    }
}
