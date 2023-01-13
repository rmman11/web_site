@extends('admin.layouts.template-forms')
@section('title', 'New Users')
@section('content')

<div class="card" style="width: 1200px;">
<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{  route('user.new')  }}">Users</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>

    <div class="card-body">
   
<form  method="POST" action="{{ route('admin.user.create')}}" enctype="multipart/form-data">

@csrf

  
<div class="row mb-3">

    <label for="inputAddress2" class="col-md-1 control-label">Name</label>
    <div class="col-sm-10">
    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
  </div>

  <div class="row mb-3">
      <label for="inputEmail4" class="col-md-1 control-label">Email</label>
      <div class="col-sm-10">
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
      @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
    </div>
    
  
    <div class="row mb-3">
    <label for="inputAddress" class="col-md-1 control-label">Address</label>
    <div class="col-sm-10">
    <input type="text" class="form-control @error('adddress') is-invalid @enderror" id="inputAddress" name="address" placeholder="1234 Main St" value="{{ old('address') }}">
    @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
  </div>


  <div class="row mb-3">
    <label for="inputAddress" class="col-md-1 control-label">Telefon</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="inputAddress" name="phone" placeholder="phone number" value="{{ old('phone') }}">
    @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
  </div>

  <div class="row mb-3">

 

     <label for="photo"    class="col-md-1 control-label">Your Picture</label>

     <div class="col-sm-5">
     <div id="img-preview">
  <img id="imgPreview" src="{{ asset('/images/avatars/default.jpg') }}"
 alt="User Image"  style="max-width:200px max-height:200px">

  </div>
      <input type="file" accept="image/" name="photo"  class="form-control"  id="photoFile">
</div>
                         </div>


         <div class="row mb-3">
    
    <label for="role" class="col-md-1 control-label">Role</label>
    <div class="col-sm-5">
    <select name="role" value="{{ old('role') }}" class="form-select" aria-label="Default select example">
  <option value="admin">Admin</option>
  <option value="author">Author</option>
  <option value="editor">Editor</option>
   <option value="manager">Manager</option>
</select>
@error('role') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
    </div>


    <div class="row mb-3">
      <label for="inputPassword4" class="col-md-1 control-label">Password</label>
      <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" value="{{ old('password') }}">
</div>
      @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
   
<div class="row mb-3">
      <label for="inputPassword4" class="col-md-1 control-label">Confirm Password</label>
      <div class="col-sm-10">
      <input  type="password"  name="password_confirmation"  class="form-control @error('password_confirmed') is-invalid @enderror" id="password_confiramtion" placeholder="Password">
      @error('password_confirmation') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
    
    </div>

  <button type="submit" class="btn btn-primary">Create User</button>
</form>
</div>
</div>
<script scr="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>

<script>
$(document).ready(()=>{
      $('#photoFile').change(function(){
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

@endsection

