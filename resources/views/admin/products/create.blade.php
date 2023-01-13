@extends('admin.layouts.template-forms')
@section('title', 'Create Product')
@section('content')

<div class="container"  style="background: #fff">
<div class="row" style="padding:20px">

         <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
     <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

<div class="form-group row">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    </div>
   <div class="row mb-3">
			<label class="col-md-1 control-label">Name</label>
      
      <div class="col-sm-10">
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" >
</div>
		</div>

    <div class="row mb-3">
    <label class="col-md-1 control-label">Categorie</label>

    <div class="col-sm-3">
    {!! Form::select('id', $categories, old('categories'), [
    'required' => '','name'=>'categorie','class'=>'form-select' ,'aria-label'=>'Default select example']) !!}
    </div>

                </div>

    <div class="row mb-3">
      <label class="col-md-1 control-label">Slug</label>
      <div class="col-sm-10">
        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
    </div>
    </div>


    <div class="row mb-3">
    
      <label class="col-md-1 control-label">Price</label>
      <div class="col-sm-10">
        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
    </div>
    </div>



    <div class="row mb-3">
  
			<label class="col-md-1 control-label">Description</label>
      <div class="col-sm-10">
			     <textarea name="description"    value="{{ old('description') }}" rows="5"
           class="form-control" >
           </textarea>
    </div>
            </div>

            <div class="row mb-3">
                

                            <label for="name" class="col-md-4 col-form-label text-md-right">Your Picture</label>
                      <div class="col-md-4">

                      <div id="img-preview">
                    <img id="imgPreview" src="{{ asset('/images/products/default.jpg') }}"
                  alt="User Image"  style="max-width:200px max-height:200px" class="form-control">

                    </div>
                    <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>

              </div>


				<button type="submit" class="btn btn-primary" >
				Save
				</button>

    </form>
  </div>
</div>
<script scr="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>

<script>
$(document).ready(()=>{
      $('#image').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });

</script>
@stop