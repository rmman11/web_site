<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;
class Profile2Controller extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');
     
    } 

public function profileFront($id)
{
    $viewData = [];
    $viewData["subtitle"] = "Profile";

    if(auth()->user()->id == $id){
        $user = User::findOrFail($id);
       // dd($user);
        return view('profile2')->with('user',$user);

        }
        return back();
  

}

}
