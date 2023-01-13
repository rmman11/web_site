<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

     
       
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link href="/css/styles.css" rel="stylesheet" />
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet" />
         <title>@yield('title', 'Online Store')</title>
         

         
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    

       <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>

       
    </head>
    <body>
    <div class="container">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="container d-flex align-items-center flex-column">
<h2>@yield('subtitle', 'A Laravel Online Store')</h2>
</div>

                </div>
            </header>

            <!-- Page Content -->
      
            <main style="background:white">
                @yield('content')
            </main>
        
        @include('admin.partial.footer')
    </div>
        
    </body>
</html>
