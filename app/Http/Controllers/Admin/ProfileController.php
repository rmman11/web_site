<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;


class ProfileController extends Controller
{
    //


    public function __construct(){

        $this->middleware('auth');
     
    } 
    public function profile($id){


        if(auth()->user()->id == $id){
        $user = User::findOrFail($id);
       // dd($user);
        return view('admin.profile.profile')->with('user',$user);

        }
        return back();
      
       }

       public function updateProfile(Request $request,$id)
 {
    
    if(auth()->user()->id == $id){
  $this -> validate($request, [
    'name' => 'required',
    'email' => 'unique:users,email,'.$id
  ],
  [
  
    'email.unique' =>'Acest email este deja in baza de date'

  ]
  
  
  );


  $user=User::findOrFail($id); //for update into the database
  if($request->hasFile('photo') ){
    $file = $request->file('photo');
   // $product->image = $filename;
   $timestamp = str_replace([' ', ':'], '-', Carbon::now() -> toDateTimeString());
   $name = $timestamp . '-' . $file -> getClientOriginalName();
   $data['photo'] = '/images/avatars' . $request->file('photo')->getClientOriginalName();
   $user->photo = $name;
   $file->move(public_path() . '/images/avatars/', $name);
}

$user->name = $request->name;
$user->email = $request->email;
$user->phone = $request->phone;
$user->address = $request->address;
//$user->role =  $request->role;

$user->save();
 

  Session::flash('success', 'Successfully update the users!');
  return back();
}
 }

 public function settings(){


    return view('admin.profile.settings');
 }
 public function resetPassword(ResetPasswordRequest $request){


  
 
  if (auth()->attempt(['email'=> auth()->user()->email,'password' => $request->password])) {
    
    //cream o parola criptata

    $newPassword = bcrypt($request->new_password);
    $user= User::findOrFail(auth()->id());
    $user->password=$newPassword;
    $user->save();
    
  }


  return redirect()->back()->with('message','The password has been changed successfully.The new password for this account is<br/>:<strong>'.$request->new_password.'</strong>');

 }

}
