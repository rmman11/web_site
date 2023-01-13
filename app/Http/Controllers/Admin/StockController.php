<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function chart()
      {
        $result = \DB::table('stocks')
                    ->where('stockName','=','apple')
                    ->orderBy('stockYear', 'ASC')
                    ->get();
        return response()->json($result);
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $viewData = [];
        $viewData["title"] = "Stock";
        $viewData["subtitle"] = "Stock";    
   return view('admin.pages.stock')->with("viewData", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = new Stock([
          'stockName' => $request->get('stockName'),
          'stockPrice' => $request->get('stockPrice'),
          'stockYear' => $request->get('stockYear'),
        ]);
        $stock->save();

        return view('admin.pages.chart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
