<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class FrontController extends Controller
{
    //

    protected $products;

     
    public function __construct(Product $products)
    {
       
         $this->products = $products;
    }


    public function welcome()
    {

        $viewData = [];  //am declarat o matrice
        $viewData["title"] = "Products - Online Store";

        $products = $this->products->latest('created_at')->paginate(10); //am extras din baza de date informatii  despre produse
        $viewData["subtitle"] = $products["name"]." -List of products";//am definit o matrice cu subtitlu
        return view('welcome')->with('products',$products)  ///am afisat rezulatele intr-o vedere
                              ->with('viewData',$viewData);     
    }
    public function about()
    {
            $data1 = "About us - Online Store";
            $data2 = "About us";
            $description = "This is an about page ...";
            $author = "Developed by: Man Marius";
            return view('about')->with("title", $data1)
            ->with("subtitle", $data2)
            ->with("description", $description)
            ->with("author", $author);
                }


    public function showInfo($id)
                {
                $viewData = [];
                $product = Product::findOrFail($id);
                $viewData["title"] = $product["name"]." - Online Store";
                $viewData["subtitle"] = $product["name"]." - Product information";
                $viewData["product"] = $product;
                return view('product_show')->with("viewData", $viewData);
                }  
                
                
                public function contact()
                {
                   

                    $viewData = [];  //am declarat o matrice
                    $viewData["title"] = "Contact";
                    $viewData["subtitle"] = "More information about this app";
            
                    return view('contact')->with('viewData',$viewData);
                  
                    
                }            
            
      

}
