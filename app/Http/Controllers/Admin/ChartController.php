<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;


class ChartController extends Controller
{
    //

    public function chart(){


  

         $product = Product::select(\DB::raw("AVG(Price) as price"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("price"))
                    ->pluck('price');

      

           return view('admin.pages.chart',compact('product'));
    }


}
