<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Session;
use DB;
use Carbon\Carbon;
use Validator, Redirect;
use File;
use App\Models\Video;

class VideoController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
     
    } 


    public function index(){

        $videos = DB::table('videos')->get();
        return view('admin.videos.index',compact('videos'));
    }

    public function uploadVideo(Request $request)
    {
       $this->validate($request, [
          'title' => 'required|string|max:255',
          'video' => 'required|file|mimetypes:video/mp4',
    ]);   $video = new Video;
    $video->title = $request->title;   
    if ($request->hasFile('video'))
    {
      $path = $request->file('video')->store('videos', ['disk' => 'my_files']);    
      $video->video = $path;
    }
    $video->save();
 
    return back()->with('message', 'Video has been uploaded');
    
   }
 
 
    public function destroy(Request $request,$id) {
 
     /*-----------here is video delete-----*/
      $video = Video::findOrFail($id);
     // $video_path = public_path($video->video);
   $path = public_path('/'.$video->video);
   
       if(File::exists($path)){
           unlink($path);
       }
 
      $video->delete();
        return back()->with('message', 'Video has been deleted!');
 
 
     }
 
}
