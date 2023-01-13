<nav class="navbar navbar-expand-lg navbar-dark" style="background:black">
<div class="container">
<a  href="{{ route('welcome') }}">Online Store</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">



@guest
<ul>

<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('welcome') }}">{{ __('Welcome') }}</a>
            </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
            </li>

            <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cart.index') }}">{{ __('Cart') }}</a>
            </li>


            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
            </li>

@else

<ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>


            
          <li class="nav-item {{ Request::is('profile2') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('profile2',auth()->user()->id) }}">{{ __('Profile') }}</a>
            </li>


          <li class="nav-item {{ Request::is('mail') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mail') }}">{{ __('Mail') }}</a>
            </li>


            <li class="nav-item {{ Request::is('faq') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('faq') }}">{{ __('Faq') }}</a>
            </li>




    @endguest


</ul>     
</div>

@guest
<ul style="float: right;">
            <li  class="nav-item" >   <a href="{{ route('login') }}" class="nav-item" style="color:white">Login </a>
</li>
<li  class="nav-item"> <a href="{{ route('register') }}" class="nav-item" style="color:white">Register</a></li>
      

 @else

<li class="nav-item dropdown ml-auto">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
            <div class="dropdown-menu dropdown-menu-right">

        <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
        <div class="dropdown-divider"></div>


      </ul> 

    @endguest

</div>

</nav>



            