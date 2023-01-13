@extends('layouts.app')
@section('title', 'Mail page')
@section('subtitle', $viewData["subtitle"])
@section('content')

  
<style>

/* Create two columns/boxes that floats next to each other */
.menu2 ul {
    float: left;
    width: 30%;
    background: #ccc;
    padding: 5px;
}

/* Style the list inside the menu */
.nav  ul li{
    list-style-type: none;
    padding: 0;
    display: block;
    width: 100px;
}

.menu2 a{

    color: white;
}

article {
    float: left;
    padding: 30px;
    width: 80%;
    background-color: #f1f1f1;
    height: auto; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}


/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}


</style>
<div class="container">
<section>
    <nav class="menu2">
      <ul class="nav nav-pills nav-stacked">
        <li class="nav-item"><a data-toggle="tab" href="#compose">Compose</a></li>
        <li class="nav-item"><a data-toggle="tab" href="#inbox">Inbox</a></li>
        <li class="nav-item"><a data-toggle="tab" href="#spam">Spam</a></li>
      </ul>
    </nav>

<article>
<div class="tab-content">
        <div id="compose" class="tab-pane fade in active">

          <h3>Compose</h3>
       @include('mail.compose')
        </div>


 <div id="inbox" class="tab-pane fade">
     <h3>Inbox</h3>

</div>


 <div id="spam" class="tab-pane fade">
     <h3>Spam</h3>

</div>






    </div>
    <article>

</section>

    </div>
 
@endsection