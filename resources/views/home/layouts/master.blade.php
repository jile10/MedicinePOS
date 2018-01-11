<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medicine POS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Image upload -->
    <link rel="stylesheet" href="/css/fileinput.min.css">
    <link rel="stylesheet" href="/css/fileinput-rtl.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/home.css">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/datatables.min.css"/>
    <style type="text/css">
      
        .mr-1{
          margin-right:34px !important;
        }
    </style>

    @yield('css')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
      <!-- Main Navbar-->
      @include('home/layouts/nav')
      @yield('content')
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/datatables.min.js"></script>
    <script src="/js/fileinput.js"></script>
    <script src="/js/jquery.twbsPagination.js"></script>
    <!-- Main File-->
    <script src="/js/front.js"></script>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
      $(document).scroll(function() {
        console.log($(this).scrollTop())
          if( $(this).scrollTop() >= 70 ) 
          {
            $('.sidebar').css({top:0});
          }
          else
          {
            $('.sidebar').css({top:'70px'});
          }
      });
    </script>
    @yield('js')
  </body>
</html>