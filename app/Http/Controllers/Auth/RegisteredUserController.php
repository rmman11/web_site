<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Carbon\Carbon;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        
        $viewData = [];
        $viewData["subtitle"] = "Register user";
        return view('admin.register')->with('viewData',$viewData);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        
$user = new User();
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);



  if ($request->hasFile('photo')) {
    //$file = Input::file('image');
    $file = $request->file('photo');
    //getting timestamp
    $timestamp = str_replace([' ', ':'], '-', Carbon::now() -> toDateTimeString());
  
    $name = $timestamp . '-' . $file -> getClientOriginalName();
    $data['photo'] = 'images/avatars' . $request->file('photo')->getClientOriginalName();
    $user->photo = $name;
  
    $file->move(public_path() . '/images/avatars/', $name);
    //dd($name);
  
  }
  
  $user->save();

       /* $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $filename,
            'password' => ,
        ]);*/

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}







