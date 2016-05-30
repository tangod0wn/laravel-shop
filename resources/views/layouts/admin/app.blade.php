<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
      <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"> 
    {{--  <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    
</head>

<body id="app-layout">
    
    @include('layouts.admin.navbar')    

    <div class="container-fluid">
      <div class="row">
            @include('layouts.admin.sidebar')
            <div class="admin-main-content">
                @yield('content')
            </div>    
        </div>
    </div>    

    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    <script src="/js/theme.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>

</html>