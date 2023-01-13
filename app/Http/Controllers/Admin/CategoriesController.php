<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Session;
use Validator, Redirect;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {


          $categories = DB::table('categories')->get();

        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();


          return view('admin.categories.create')->with([
            'categories'  => $categories
          ]);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except('_token');

        Category::create($data);


        //dd($data);
        return redirect()->route('admin.categories.index')->withSuccess('You have successfully created a Category!');
    }


    /**
     * Show the form for editing Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

/*
        $category = DB::table('categories') -> find($id);
        return view('categories.edit_cat', ['category' => $category]);*/

        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));


    }

    /**
     * Update Category in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->update($request->all());


        Session::flash('message', 'Successfully update the users!');
        return back();
    }




    public function show(Request $request,$id) {
      $categories = Category::with('children')->findOrFail($id);
   return view('admin.categories.show')->with([
        'categories'  => $categories
      ]);

    }

    /**
     * Remove Category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('message', 'Successfully deleted the users!');
        return back();
    }






}
