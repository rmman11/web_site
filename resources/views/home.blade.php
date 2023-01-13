@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')


<div class="container">

    <div class="row">

  <h2>Here is the first page when you are logged</h2>
  
    <div class="col-8 bg-white">
      

    <img src="{{URL::asset('/images/avatars/'.$user->photo)}}"        alt="User Image"  style="width:200px ;height:200px">

    </div>
    <div class="col-4 bg-white">
      

    <div class="card-header">Dashboard</div>


@if (session('status'))

    <div class="alert alert-success" role="alert">

        {{ session('status') }}

    </div>

@endif



<div class="card-body">

You are normal user.

</div>



    </div>
  </div>
  <br>
  <div class="row" style="height: 400px">
    <div class="col-3 bg-success">
      <div  class="menu2">

<ul class="nav nav-tabs">
 <li><a  data-bs-toggle="tab" href="#electricPowerHistory">Electric Power History</a>
</li>
<li><a  data-bs-toggle="tab"  href="#lawrenceHydropower">Lawrence Hydropower</a></li>
 <li><a  data-bs-toggle="tab"  href="#area">Area Description</a></li>
 <li><a  data-bs-toggle="tab" href="#microgridPossibilities">Microgrid Possibilities</a></li>
 <li><a  data-bs-toggle="tab"  href="#typicalProperty">Typical Property</a></li>
 <li><a  data-bs-toggle="tab"   href="#collector">Collector Performance</a></li>
 <li><a  data-bs-toggle="tab"  href="#electric">Electric Power Services</a></li>
 <li><a  data-bs-toggle="tab"  href="#downtown">Downtown Properties</a></li>
 <li><a  data-bs-toggle="tab" href="#solar">Solar Shadowing</a></li>
 </ul>

 </div>




    </div>
    <div class="col-4 bg-white">
      
<div class="tab-content"  id="tab">
 <div id="electricPowerHistory"  class="container tab-pane active"><br>
      <h3>Electric Power History</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p><img src="/images/power.jpg" alt="Power Electric"/></p>
    </div>
    <div id="lawrenceHydropower"  class="container tab-pane fade active"><br>
      <h3>Lawrence Hydropower</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
         <p><img src="/images/lawrence.jpg" alt="Lawrence Hydropower"/></p>
    </div>
    <div id="area"  class="container tab-pane fade"><br>
      <h3>Area Description</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
         <p><img src="/images/area.png" alt="Area Description"/></p>
    </div>

 <div id="microgridPossibilities"  class="container tab-pane fade"><br>
      <h3>Microgrid Possibilities</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
         <p><img src="/images/microgrid.jpg" alt="Microgrid Possibilities"/></p>
    </div>

     <div id="typicalProperty"  class="container tab-pane fade"><br>
      <h3>Typical Property</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
         <p><img src="/images/typical.jpg" alt="Typical Property"/></p>
    </div>
     <div id="localEnergy"  class="container tab-pane fade"><br>
      <h3>Local Energy</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        <p><img src="/images/energy.jpg" alt="Local Energy"/></p>
    </div>
     <div id="collector"  class="container tab-pane fade"><br>
      <h3>Collector Performance</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
         <p><img src="/images/collector.png" alt="Collector Performance"/></p>
    </div>
     <div id="electric"  class="container tab-pane fade"><br>
      <h3>Electric Power Services</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
         <p><img src="/image/power_services.jpg" alt="Electric Power Services"/></p>
    </div>


 <div id="downtown"  class="container tab-pane fade"><br>
      <h3>Downtown Properties</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
      
    </div>
     <div id="solar"  class="container tab-pane fade"><br>
      <h3>Solar Shadowing</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
       <p><img src="/images/solar_sha.jpg" alt="Solar Shadowing"/></p>
    </div>

</div>
    </div>

  </div>
  <br>
  <div class="row">
    <div class="col-4 bg-success">1 of 4</div>
    <div class="col-6 bg-warning">2 of 4</div>
    <div class="col bg-success">3 of 4</div>
    <div class="col bg-warning">4  of 4</div>
  </div>
</div>


   


        @endsection