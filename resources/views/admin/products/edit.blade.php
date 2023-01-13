@extends('admin.layouts.template-forms')
@section('title', 'Editare Product')
@section('content')


<div class="card" style="width: 1200px;">

  
  <div class="row" style="padding:20px">


<form  method="POST" action="{{ route('products.update',$product->id)}}" enctype="multipart/form-data">

@csrf
@method('put')

      <div class="row mb-3">
        <label class="col-md-1 control-label">Name</label>
          
      <div class="col-sm-10">
        <input type="text"   name="name" value="{{ $product->name }}" class="form-control">
        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
    </div>
      </div>


      <div class="row mb-3">
        <label class="col-md-1 control-label">Categorie</label>

  
        <div class="col-sm-4">
        {!! Form::select('categorie_id', $cat, null,['class'=>'form-select' ,'aria-label'=>'Default select example']) !!}
    </div>

      </select>

    </div>
    <div class="row mb-3">
      <label class="col-md-1 control-label">Slug</label>
        
      <div class="col-sm-10">
      <input type="text" name="slug"   value="{{ $product->slug }}" class="form-control">
      @error('slug') <span class="text-danger small">{{ $message }}</span> @enderror
        
    </div>
    </div>


    <div class="row mb-3">
      <label class="col-md-1 control-label">Price</label>
   
        
      <div class="col-sm-10">
      <input type="text" name="price"  value="{{ $product->price }}" class="form-control">
      @error('price') <span class="text-danger small">{{ $message }}</span> @enderror

    </div>
    </div>



    <div class="row mb-3">
      <label class="col-md-1 control-label">

        <strong>Detail:</strong>

      </label>
        
      <div class="col-sm-10">
      <textarea name="description"  value="{{ $product->description }}" class="form-control">
        {{ $product->description }}
      </textarea>
    </div>
    </div>

    <div class="row mb-3">

      <label for="name" class="col-md-1 col-form-label text-md-right">Your Picture</label>
      <div class="col-md-6">
        <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
        <img src="{{URL::asset('/images/products/'.$product->image)}}"  width="600" height="300">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
      </div>

    </div>


    <button type="submit" class="btn btn-primary" >
      Edit
    </button>

    {{ Form::close() }}
  </div>

</div>

@stop