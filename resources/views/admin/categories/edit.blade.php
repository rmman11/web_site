
@extends('admin.layouts.template-forms')
@section('title', 'Update')
@section('content')
<div class="modal-body"> 
  
<form  method="POST" action="{{ route('categories.update',$category->id)}}" enctype="multipart/form-data">

@csrf
@method('put')

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="title"  id="edit_name" class="form-control" value="{{ $category->title }}">
                            </div>
                        </div>

                      
    <button type="submit" class="btn btn-primary">Update</button>
    <input type="hidden" id="id" name="id">
    </form>

  </div>
@endsection