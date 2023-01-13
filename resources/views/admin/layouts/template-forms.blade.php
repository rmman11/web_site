
@include('admin.partial.head')
    <body class="sb-nav-fixed">


    @auth()

    @include('admin.layouts.sidebar')

     @endauth      
    <div id="layoutSidenav_content">
       
                <main>
                <div  class="container" style="margin-left:220px; padding:30px; background:white ">
                  @include('admin.partial.message')
                    <h1 class="mt-4">@yield('title')</h1>

               @yield('content')
               </div>

          </main>
          @include('admin.partial.footer')
            </div>
          
            