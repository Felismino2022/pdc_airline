<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        
        <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
        <link href="{{ asset('/css/styles.css') }} " rel="stylesheet">
        <!-- Styles -->
            @yield('header')
   
            @yield('content')

            @yield('footer')
       


            <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}">
            
            
            <script src="{{ asset('/bootstrap/js/jquery.min.js') }}"></script>
         
    
            
          
        </body>
</html>