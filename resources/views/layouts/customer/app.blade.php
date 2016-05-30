<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="/css/bootstrap.min.css" rel="stylesheet"> 
  <!-- Styles -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/cart.css">
  <link rel="stylesheet" href="/css/customer.css">
  <script src="/js/modernizr.js"></script>
  <script src="/js/TreeMenu.js"></script>



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  @include('layouts.customer.nav')
  <div class="container-fluid customer_area">
    <div class="row">
      <div class="col-md-2 left_sidebar">
        @include('layouts.customer.left-sidebar')
      </div>
      <div class="col-md-10 main_content">

        @yield('banner')
        <div class="row">
          <div class="col-md-11">

            @yield('content')
          </div>
        </div>

      </div>
    </div>
   


  </div>
  <script src="/js/jquery.min.js"></script>
  <script src="js/notifIt.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/login.js"></script>
  <script src="/js/rightsidebar.js"></script>
  <script src="/js/range.js"></script>

</body>
</html>