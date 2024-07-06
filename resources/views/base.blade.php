<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      @section('title')
          
      @endsection
    </title>
    <link href="{{asset('node_modules\bootstrap\dist\css\bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('node_modules\@fortawesome\fontawesome-free\css\fontawesome.css')}}" rel="stylesheet" >
    <link href="{{asset('node_modules\@fortawesome\fontawesome-free\css\brands.css')}}" rel="stylesheet" >
    <link href="{{asset('node_modules\@fortawesome\fontawesome-free\css\solid.css')}}" rel="stylesheet" >
</head>
@yield('style')
  <body>
    @yield('nav')
    @yield('header')
    @yield('body')
    @yield('footer')
    <script src="{{asset('node_modules\bootstrap\dist\js\bootstrap.bundle.min.js')}}" ></script>
  @yield('javascript')
  </body>
</html>