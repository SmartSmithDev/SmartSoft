<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">

	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('../vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css') }}">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('../vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css') }}">
	

	@yield('css')
    @yield('stylesheet')
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">








	<!-- jQuery 3 -->
	<script src="{{ asset('plugins/jquery/jquery/dist/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('plugins/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>


	

	
	<!-- Bootstrap 3.3.7 -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- datepicker -->
	<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

	

	<!-- daterangepicker -->
	<script src="{{ asset('plugins/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('js/daterangepicker.js') }}"></script>

	<!-- Bootstrap WYSIHTML5 -->
	<script src="{{ asset('../vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


	<!-- Slimscroll and FastClick plugins.: to enhance the user experience -->
	<!-- Slimscroll -->
	<script src="{{ asset('plugins/jquery/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>


	<!-- AdminLTE App -->
	<script src="{{ asset('../vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js') }}"></script>


	


    @yield('js')
    @yield('scripts')
</head>