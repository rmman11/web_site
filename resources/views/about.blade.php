@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')

<div class="container">

<div class="row" style="padding:20px">
<div class="col-lg-4 ms-auto">
<p class="lead">
	
 Thomas Edison's first electric power plant generated 110-volt direct current (DC) for lighting and variable-speed machinery in nearby buildings. But efficient transmission of power over long distances requires higher voltages. In those days, the only way to transform DC voltage was to use a "genset" - a DC motor driving a DC generator. That's two rotating machines, with four windings.

Then Nikola Tesla invented the alternating current(AC)induction motor and transformer. With constant AC frequency, an induction motor's speed cannot vary, but it is cheaper and more durable than a DC motor. Since a transformer has no moving parts and just two windings, it is cheaper and more durable than a DC genset. So at the dawn of the 20th century, AC won "the war of the currents."

But not forever. In the middle of the 20th Century, computers began consuming progressively more DC power. Then came the insulated-gate bipolar transistor(IGBT)and the voltage-source converter(VSC). A VSC can make variable-frequency AC which runs induction motors at variable speed, and it easily transforms DC.

DC power, computer control, and the internet are helping the power grid accept variable renewable resources like wind and solar. And they are improving electrical distribution systems on campuses, in neighborhoods, and in buildings. With local energy generation and storage, distribution systems are evolving into robust "microgrids." 


</p>
</div>
<div class="col-lg-4 me-auto">
<p class="lead">{{ $author }}


 <img src="{{ asset('/images/man.jpg') }}" alt="product"
                                 width="400" height="400">

</p>
</div>
</div>
</div>
@endsection