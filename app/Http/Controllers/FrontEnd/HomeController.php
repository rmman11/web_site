<?php



namespace App\Http\Controllers\FrontEnd;

use Session;
use Carbon\Carbon;
use App\Repositories\HistoryRepository;
use App\Repositories\TaskRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use DB;
use Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user = Auth::user();
        return view('home',compact('user'));
    }

       public function faq(){
        $viewData = [];
        $viewData["subtitle"] = "FAQ";
        return view('faq')->with('viewData',$viewData);

       }   

}
