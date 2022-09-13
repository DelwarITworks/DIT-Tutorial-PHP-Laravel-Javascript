<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Documentation For Bootcamp - Online Courses HTML Template</title>
<!-- Stylesheets -->
<link href="{{ asset('public/frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('public/frontend/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/frontend/assets/css/scrollbar.css') }}" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<!--Page Wrapper-->
<div class="page-wrapper">
    
   @include('layouts.header')
    
   @yield('content')
    
    
</div>
<!--End pagewrapper-->

<script src="{{ asset('public/frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.nav.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/jquery.scrollTo.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/scrollbar.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/script.js') }}"></script>
</body>
</html>