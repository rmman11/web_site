@extends('admin.layouts.template-forms')
@section('title', 'Editare User ' .$user->name)
@section('content')


<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{  route('user.new')  }}">Users</a></li>
                            <li class="breadcrumb-item active">Edit user {{ $user->name }}</li>
                        </ol>

<div class="card" style="width: 1200px;">
    <div class="card-body">
  

    <form  method="POST" action="{{ route('users.update',$user->id)}}" enctype="multipart/form-data">

@csrf
@method('put')

<div class="row mb-3">

    <label for="inputAddress2" class="col-md-1 control-label">Name</label>
    <div class="col-sm-10">
    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name"  value="{{ $user->name }}">
    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
  </div>

  <div class="row mb-3">
      <label for="inputEmail4" class="col-md-1 control-label">Email</label>
      <div class="col-sm-10">
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
      @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
    </div>
    
  
    <div class="row mb-3">
    <label for="inputAddress" class="col-md-1 control-label">Address</label>
    <div class="col-sm-10">
    <input type="text" class="form-control @error('adddress') is-invalid @enderror" id="inputAddress" name="address" placeholder="1234 Main St" 
    value="{{ $user->address }}">
    @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
  </div>


  <div class="row mb-3">
    <label for="inputAddress" class="col-md-1 control-label">Telefon</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="inputAddress" name="phone" placeholder="phone number" 
    value="{{ $user->phone }}">

</div>
  </div>

  <div class="row mb-3">
     <label for="photo"    class="col-md-1 control-label">Your Picture</label>
  <img src="{{URL::asset('/images/avatars/'.$user->photo)}}"        alt="User Image"  style="width:200px ;height:200px">
      <input type="file" accept="image/" name="photo"  class="form-control"  id="photoFile">
</div>
                         </div>


         <div class="row mb-3">
    
    <label for="role" class="col-md-1 control-label">Role</label>
    <div class="col-sm-5">
    <select name="role" class="form-select" aria-label="Default select example">
  <option value="admin " {{ $user->role == "admin" ? 'selected' :'' }}>Admin</option>
  <option value="author" {{ $user->role == "author" ? 'selected' :'' }}>Author</option>
  <option value="editor" {{ $user->role == "editor" ? 'selected' :'' }}>Editor</option>
   <option value="manager" {{ $user->role == "manager" ? 'selected' :'' }}>Manager</option>
</select>
@error('role') <span class="text-danger small">{{ $message }}</span> @enderror
</div>
    </div>


    </div>

  <button type="submit" class="btn btn-primary">Edit User</button>
</form>
</div>
</div>
@endsection