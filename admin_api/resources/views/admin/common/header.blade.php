@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin| @yield('title')</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin/matrix-media.css')}}" />
<link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/admin/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<a href="{{url(route('admin_dashboard'))}}"><div id="header">
  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SBA</h1>
</div></a>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    
    <li class=""><a title="" href="{{url(route('Admin.Logout'))}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!--close-top-serch-->
@endsection