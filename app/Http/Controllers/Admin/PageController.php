<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Models\User;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;


class PageController extends Controller
{
    


 public function cpuinfo() {
    $viewData = [];
    $arr_free = [];
    $memorys = [];
    $viewData["title"] = "How to check ram and cpu";
    $viewData["subtitle"] = "How to check ram and cpu";




        return view('admin.pages.cpu')->with("viewData", $viewData);
    }


    public function import() 
    {
        Excel::import(new UserImport,request()->file('file'));
           
        return back();
    }
 public function exportUsers(Request $request){
    return Excel::download(new ExportUser, 'users.xlsx');
    }
     
 public function siteMap() {

    $viewData = [];
        $viewData["title"] = "Site Map";
        $viewData["subtitle"] = "Site Map";



    return view('admin.pages.siteMap',['viewData'=>$viewData]);
}
 
public function calendar(Request $request) {
        $viewData = [];
        $viewData["title"] = "Calendar";
        $viewData["subtitle"] = "Calendar";
     

       
        if($request->ajax()) {
       
            $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
  
            return response()->json($data);
        }
 

          return view('admin.pages.calendar')->with("viewData", $viewData);

}
public function ajax(Request $request)
{
    switch ($request->type) {
       case 'add':
            $event = Event::create([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            return response()->json($event);
        break;

        case 'update':
            $event = Event::find($request->id)->update([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            return response()->json($event);
        break;

        case 'delete':
            $event = Event::find($request->id)->delete();
            
            return response()->json($event);
        break;
         
        default:
        # code...
        break;
    }
}

}