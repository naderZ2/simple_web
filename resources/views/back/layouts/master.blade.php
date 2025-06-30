<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ __('s_site_name')}} Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('back/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('back/fontawesome/css/all.css')}}">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('back/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('back/plugins/datepicker/datepicker3.css')}}">
      <link rel="icon" href="{{asset('uploads/sliders/6429973.png')}}" type="image/png">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('back/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('back/dist/css/skins/_all-skins.min.css')}}">
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
	
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{ __('s_site_name')}}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ __('s_site_name')}}</b> </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <i class="fas fa-align-justify"></i>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
				<i class="fas fa-sign-out-alt"></i>
			  	<span class="hidden-xs">خروج</span>
			</a>
			  
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>  

          </li>
        </ul>
      </div>

    </nav>
  </header>
  
  @yield('menu_content')

  @yield('back_content')

  <footer class="main-footer">
    <div class="copyright">
          <p class="textcopyright">{{ __('s_copyright')}} <span>{{ __('s_site_name')}}</span>.</p>
        </div>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->	
	
<!-- jQuery 2.2.0 -->
<script src="{{url('back/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('back/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('back/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{url('back/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('back/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('back/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('back/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('back/dist/js/demo.js')}}"></script>	

<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	  
    $(".textarea").wysihtml5();
	  
    $('#datepicker').datepicker({
      autoclose: true
    });
	  
  });
</script>
	
</body>
</html>
