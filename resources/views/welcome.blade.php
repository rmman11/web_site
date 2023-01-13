@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('subtitle', $viewData["subtitle"])
@section('content')


  
<div class="container-fluid">
@foreach ($products->chunk(4) as $items)
         <div class="row">
             @foreach ($items as $product)
             <div class="col-md-6 col-lg-3 mb-2">
<div class="card-body" style="border:2px solid">
                         <div class="caption text-center">

                  
                                 <img src="{{ asset('/images/products/' . $product->image) }}" alt="product"
                                 width="100" height="100">
                                 <a href="{{ route('showInfo', ['id'=> $product->getId()]) }}"
class="btn bg-primary text-white"><h3>{{ $product->getName() }}</h3></a>
                             <p>{{ $product->price }}</p>
                             
                         </div> <!-- end caption -->
                      


                     </div> <!-- end thumbnail -->
                 </div> <!-- end col-md-3 -->
             @endforeach
         </div> <!-- end row -->
     @endforeach
     </div>

{{$products->links("pagination::bootstrap-4")}}


        @endsection
