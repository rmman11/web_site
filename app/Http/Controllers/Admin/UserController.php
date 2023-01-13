<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function __construct(){

   $this->middleware('admin');

    }
  public function showUsers(){


     $users =User :: all()->sortBy('name');
     return view('admin.users.users')->with('users',$users);

  }


  public function newUser()
  {
      //add in database
    return view('admin.users.new_user');

  }
  public function create(CreateUserRequest $request)
  {
 
 
      $user=new User;

      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->role =  $request->role;
      $user->password=bcrypt($request->password);


      
  if ($request->hasFile('photo')) {
    //$file = Input::file('image');
    $file = $request->file('photo');

    $extension = $request->file('photo')->getClientOriginalExtension();
    //getting timestamp
    $timestamp = str_replace(' ',' ',$request->name). '_' .time().'.'.$extension;

    $photoName = $timestamp . '-' . $file -> getClientOriginalName();
    $data['photo'] = 'images/avatars' . $request->file('photo')->getClientOriginalName();
    $user->photo = $photoName;
  
    $file->move(public_path() . '/images/avatars/', $photoName);
    //dd($name);
  
  }

      $user->save();
      Session::flash('message', 'Successfully insert the users!');
      return redirect(route('users'));
 
  }
 
 
  public function edit($id)
  {

    $user = User::findOrFail($id);;
  return view('admin.users.edit', compact('id','user'));

  }

// Editare utilizator in baza de date
public function update(Request $request,$id)
 {
    

  $this -> validate($request, [
    'name' => 'required',
    'email' => 'unique:users,email,'.$id
  ]);


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
$user->role =  $request->role;

//dd($user);
$user->save();
 

  Session::flash('message', 'Successfully update the users!');
 return back();
 }



///is the show the user
public function show($id)
 {


     
   $users= User::find($id);
     return view('admin.users.show', compact('users'));
 }
//is delete the user
 public function destroy($id)
 {

 

   $users= User::find($id);//obtinerea unui uitilizator

   //am pus conditia sa nu stergem un utilizator
   if($users->role == "admin"){
   
    return redirect(route('users'));

   }




   if(!($users->photo == 'default.jpg')){
     unlink('/images/avatars/' .$users->photo);
   }
   $users->delete();
   Session::flash('message', 'Successfully deleted the users!');
   return back();


 }



}
