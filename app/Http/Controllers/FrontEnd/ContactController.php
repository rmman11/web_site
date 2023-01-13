<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\Notification;
use Mail;
use File;

class ContactController extends Controller
{
    

    function index(){

        $viewData = [];
   
        $viewData["subtitle"] = "Contact page";
   
        return view('mail.index')->with("viewData", $viewData);
    }


  // Store Contact Form data
  public function ContactUsForm(Request $request) {
    // Form validation
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'subject'=>'required',
        'message' => 'required',
        'document' => 'required'
     ]);
     
    //  Store data in database
    Contact::create($request->all());

    $path = public_path('uploads/');
    $document = $request->file('document');
    $name = time().'.'.$document->getClientOriginalExtension();


    if(!File::exists($path)) {
       File::makeDirectory($path, $mode = 0777, true, true);
   }
   $document->move($path, $name);

   //$files = $path.'/'.$name;

   $files = [
  'document' =>$request->file('document'),
  
];



   $data = array(
    'name' => $request->get('name'),
    'email' => $request->get('email'),
    'phone' => $request->get('phone'),
    'subject' => $request->get('subject'),
    'user_query' => $request->get('message'),
    'document'  =>$request->get('document'));
    //  Send mail to admin
    
Mail::to('devep@school.com')->send(new SendMail($data));
    
    
    return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
}


}
