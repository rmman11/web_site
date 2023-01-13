@extends('layouts.app')
@section('content')

                  
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">{{$viewData["subtitle"] }}</h3></div>
                                    <div class="card-body">
                                              <!-- Validation Errors -->
      
                                    <form method="POST" action="{{ route('login') }}">
            @csrf

                                            <div class="form-group row">
                                            <label for="email" class="col-md-2 col-form-label text-md-right">
                                  <i class="fa fa-user icon"  ></i>
                                Email</label>
                                                <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                           
                                            </div>
                                            @error('email') <span class="text-danger sm">{{$message}}</span>@enderror
                                            <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa fa-key icon"></i>Password</label>
                                                <input name="password" class="form-control" id="password-field"  type="password" placeholder="Password" />
                                               
                                            </div>
                                            @error('password') <span class="text-danger sm">{{$message}}</span>@enderror
                                        

                                            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>         
                
@endsection