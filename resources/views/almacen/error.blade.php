<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>IPE</title>
	

	{!! Html::style('components/bootstrap/dist/css/bootstrap.css') !!}
	{!! Html::style('components/admin-lte/dist/css/AdminLTE.css') !!}
	{!! Html::style('components/admin-lte/dist/css/skins/_all-skins.css') !!}
	{!! Html::style('components/font-awesome/css/all.css') !!}
	{!! Html::style('components/toastr/toastr.css') !!}		

	<!-- Boostrap Table CSS-->
	{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!} 

	<!-- Boostrap Table Filter Control CSS-->
	{!! Html::style('components/bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.css') !!} 

	<!-- Boostrap Table Select CSS-->
	{!! Html::style('components/bootstrap-select/dist/css/bootstrap-select.css') !!} 
	{!! Html::style('components/ajax-bootstrap-select/dist/css/ajax-bootstrap-select.css') !!} 

	<!-- HoldOn.js -->
	{!! Html::style('components/hold-on/HoldOn.min.css') !!} 


	<style>
		.user-body{
			position:relative;
			z-index:0; 
		}

		#search{
			position:relative;
			display: block;
			z-index:1;
		}

	</style>	

	
	@yield('style')

</head>
<body  class="skin-black sidebar-mini @if (Cookie::get('toggleState') === 'closed') {{ 'sidebar-collapse' }} @endif ">

	<div class="wrapper">
		<!-- Main Header -->
		<header class="main-header">
			<!-- Logo -->
			<a href="" class="logo" style="background-color: #aa983f;">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini" style="background-color: #aa983f; color:#FFFFFF">IPE</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg" style="background-color: #aa983f; color:#FFFFFF">IPE</span>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation"  style="background-color: #aa983f;">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color:#060100">
					<span class="sr-only">Toggle navigation</span>
				</a>

				
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">	
					</ul>
				</div>
			</nav>
		</header>


		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
			</section>
			<!-- /.sidebar -->
		</aside>
		<div class="content-wrapper" style="min-height: 1080.3px; background-color: #F3EFE0;">
			<div class="container-fluid">
			    <div class="row">
			        <div class="col-sm-12 margin-tb text-center">
			            <div class="row">
			                <h2 align="center" class=" col-sm-12 text-nowrap fas fa-exclamation-triangle">
			                    <span style="font-family: 'Roboto';">Error de conexión</span>
			                </h2>
			        	</div>
			        	<div class="row">
			        		<h3 align="center" class="col-sm-12 text-nowrap nombre-ventana">Hubo un error al intentar conectarse con la base de datos, porfavor contacte al Departamento de Tecnologías de la Información</h3>
			        	</div>
			        </div>
			        <div class="col-sm-12 margin-tb text-center">
			        	<a class="btn btn-primary" data-toggle="collapse" href="#detalles" role="button" aria-expanded="false" aria-controls="detalles">Ver detalles...</a>
			        </div>
			    </div>
			    <p></p>
			    <div id="detalles" class="collapse">
			    	<div>
			    	@foreach($error as $key=>$value)
			    		<p>{{$key}} : {{$value}}</p>
			    	@endforeach
			    	@foreach($stack as $linea)
			    		@if(array_key_exists('file',$linea) && !strpos($linea['file'],'vendor'))
			    			<p>Error en archivo: {{$linea['file']}} en la línea {{$linea['line']}}</p>
			    		@endif
			    	@endforeach
			    </div> 
			    </div>
			</div>
		</div>
		<footer class="main-footer" style="background-color: #F3EFE0;">
			<div class="pull-right hidden-xs">
				<b>Version</b> "1.0"
			</div>
			<strong>Instituto de Pensiones del Estado</strong>
		</footer>
	</div>
	
</body>
<script src="{{ asset('components/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
	
<script src="{{ asset('components/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('components/admin-lte/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('components/toastr/toastr.js') }}"></script>
<script src="{{ asset('components/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
<script src="{{ asset('components/inputmask/dist/inputmask/inputmask.js') }}"></script>
<script src="{{ asset('components/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"></script>	
<script src="{{ asset('components/inputmask/dist/inputmask/inputmask.extensions.js') }}"></script>

<!-- Boostrap Table JS-->
<script src="{{ asset('components/bootstrap-table/dist/bootstrap-table.js') }}"></script>
<script src="{{ asset('components/bootstrap-table/src/locale/bootstrap-table-es-MX.js') }}"></script>

<!-- Boostrap Table Filter Control JS-->
<script src="{{ asset('components/bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.js') }}"></script>


<!-- Boostrap Table Filter JS-->
<script src="{{ asset('components/bootstrap-table/dist/extensions/filter/bootstrap-table-filter.js') }}"></script>

<!-- Boostrap Table Export JS-->
<script src="{{ asset('components/bootstrap-table/dist/extensions/export/bootstrap-table-export.js') }}"></script>


<!-- Boostrap Table Select JS-->
<script src="{{ asset('components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('components/ajax-bootstrap-select/dist/js/ajax-bootstrap-select.js') }}"></script>

<!-- HoldOn.js -->
<script src="{{ asset('components/hold-on/HoldOn.min.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('components/moment/locale/es.js') }}"></script>
</html>

