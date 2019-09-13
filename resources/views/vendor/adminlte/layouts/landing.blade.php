<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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

		
		{!! Html::style('components/bootstrap/less/mixins/image.less') !!} 

		@yield('style')

	</head>
<body class="skin-yellow sidebar-mini @if (Cookie::get('toggleState') === 'closed') {{ 'sidebar-collapse' }} @endif ">
	<div class="wrapper">
		<!-- Main Header -->
		<header class="main-header">
			<!-- Logo -->
			<a href="" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>IPE</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>IPE</b></span>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">					

						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
	                        @if (Auth::guest())
					
								<li>
									<form action="#" method="get" class="navbar-form dark">
										<div class="input-group">
											<input type="text" name="q" class="form-control" placeholder="Buscar Extensiones...">
											<span class="input-group-btn">
												<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
												</button>
											</span>
										</div>
									</form>
								</li>

	                            <li><a href="{{ route('login') }}">
									<i class="fa fa-lock" aria-hidden="true"></i>
									 Iniciar sesión</a>
								</li>
								
	                            {{--<li><a href="{{route('register')}}">Register</a></li>--}}
	                        @else
	                            <li class="dropdown">
	                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                    {{ Auth::user()->name }} <span class="caret"></span>
	                                </a>

	                                <ul class="dropdown-menu" role="menu">
	                                    <li>
	                                        <a href="{{ route('logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                            Salir
	                                        </a>

	                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                            {{ csrf_field() }}
	                                        </form>
	                                    </li>
	                                </ul>
	                            </li>
	                        @endif							

							
							<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								
								{--{ HTML::image('components/admin-lte/dist/img/user2-160x160.jpg', 'User Image', array('class' => 'user-image')) }--}																
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								
								<li class="user-header">
									{-- HTML::image('components/admin-lte/dist/img/user2-160x160.jpg', 'User Image', array('class' => 'img-circle')) --}									
									<p>
									Alexander Pierce - Web Developer
									<small>Member since Nov. 2012</small>
									</p>
								</li>								
								<li class="user-body">
									<div class="row">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</div>									
								</li>								
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="#" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>-->
						</li>
						<!-- Control Sidebar Toggle Button -->
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				{{--<div class="user-panel">
					<div class="pull-left image">						
						{{ HTML::image('components/admin-lte/dist/img/user2-160x160.jpg', 'User Image', array('class' => 'img-circle')) }}
					</div>
					<div class="pull-left info">
						<p>{{ Auth::user()->name }}</p>
						<!-- Status -->
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>--}}

				<!-- search form (Optional) -->
				{{--<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>--}}
				<!-- /.search form -->
				<!-- Sidebar Menu -->
				{{--<ul class="sidebar-menu" data-widget="tree">
					<li class="header">INTRANET</li>
					<li class=""><a href=""><i class="fa fa-link"></i> <span>Intranet</span></a></li>
					@forelse($menus as $key => $item)
						@if($item['parent'] != 0)
							@break
						@endif				
							@include('layouts.partials.sidebar-menu', ['item' => $item])
					@empty
					@endforelse
				</ul>--}}					
				<!-- Sidebar Menu -->

				<ul class="sidebar-menu" data-widget="tree">
				@if(!Auth::user())

					<!-- MODULO DE INTRANET -->	
					<li class=""><a href=""><i class="fa fa-home"></i> <span>INTRANET</span></a></li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-user"></i>
							<span>NOSOTROS</span>
							<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="UI/general.html"><i class="fa fa-spinner"></i> Marco Histórico</a></li>
							<li><a href="UI/icons.html"><i class="fa fa-spinner"></i> Misión - Visión - Filosofía</a></li>
							<li><a href="UI/buttons.html"><i class="fa fa-spinner"></i> Información Institucional</a></li>
							<li><a href="UI/sliders.html"><i class="fa fa-spinner"></i> Derechos y Obligaciones</a></li>
							<li><a href="UI/timeline.html"><i class="fa fa-spinner"></i> Organigrama</a></li>
							<li><a href="UI/modals.html"><i class="fa fa-spinner"></i> Marco Legal</a></li>
							<li><a href="UI/modals.html"><i class="fa fa-spinner"></i> Directorio Teléfonico</a></li>
						</ul>
					</li>

						<!-- MODULO DE SERVICIOS -->	
					<li class="treeview">
						<a href="#">
							<i class="fa fa-tags"></i>
							<span>SERVICIOS</span>
							<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="UI/general.html"><i class="fa fa-spinner"></i> Pensionados y Jubilados</a></li>
							<li><a href="UI/icons.html"><i class="fa fa-spinner"></i> Afiliación y Vigencia</a></li>
							<li><a href="UI/buttons.html"><i class="fa fa-spinner"></i> Préstamos</a></li>
							<li><a href="UI/sliders.html"><i class="fa fa-spinner"></i> Devoluciones</a></li>
							<li><a href="UI/timeline.html"><i class="fa fa-spinner"></i> Otras Prestaciones</a></li>
							<li><a href="UI/modals.html"><i class="fa fa-spinner"></i> Marco Legal</a></li>
							<li><a href="UI/modals.html"><i class="fa fa-spinner"></i> Cambio de Forma de Pago</a></li>
						</ul>
					</li>

					<!-- MODULO DE TRANSPARENCIA -->	
					<li class="treeview">
						<a href="#">
							<i class="fa fa-link"></i>
							<span>TRANSPARENCIA</span>
							<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="UI/general.html"><i class="fa fa-spinner"></i> Ley General</a></li>
							<li><a href="UI/icons.html"><i class="fa fa-spinner"></i> Ley 875</a></li>
							<li><a href="UI/buttons.html"><i class="fa fa-spinner"></i> Reserva Técnica</a></li>
							<li><a href="UI/sliders.html"><i class="fa fa-spinner"></i> S.A.R</a></li>
							<li><a href="UI/timeline.html"><i class="fa fa-spinner"></i> Ley 848</a></li>
						</ul>
					</li>

					@endif			
				</ul>


				@auth
					<ul class="sidebar-menu" data-widget="tree">

						

						<!-- MODULO DE ADMINISTRADOR-->
						@if(Auth::user()->name == 'admin')
							
						<!--	<li class=""><a href="{!! route('admin.index') !!}"><i class="fas fa-cogs"></i> <span>Configuración</span></a></li>-->
							<li class=""><a href="{!! route('expediente.index') !!}"><i class="fas fa-folder-open"></i> <span>Expediente Electrónico</span></a></li>
							
						@endif

						<!-- MODULO DE ALMACÉN-->

						@if(Auth::user()->name == 'almacen_admin')
							
							<li class=""><a href="{!! route('almacen.index') !!}"><i class="fas fa-box-open"></i> <span>Almacén</span></a></li>
							
						@endif

						<!-- MODULO DE COMPRAS-->

						@if(Auth::user()->name == 'compras_admin')
							
							<li class=""><a href="{!! route('compras.index') !!}"><i class="fas fa-cart-plus"></i> <span>Compras</span></a></li>
							
						@endif	

					</ul>
				@endauth
				<!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>
		<div class="content-wrapper" style="min-height: 1080.3px;">
			<section class="content-header">
				@yield('content-header')				
			</section>			
			<!-- Main content -->
			<section class="content">
				<div class="row">
					@yield('content')
				</div>
			</section>
			
		</div>
	
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> "1.0"
			</div>
			<strong>Instituto de Pensiones del Estado</strong>		
		</footer>		
	</div>
	@include('adminlte::layouts.partials.modal_gral')
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
		<script src="{{ asset('components/bootstrap-table/dist/extensions/tableExport/tableExport.js') }}"></script>

		<!-- Boostrap Table Select JS-->
		<script src="{{ asset('components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
		<script src="{{ asset('components/ajax-bootstrap-select/dist/js/ajax-bootstrap-select.js') }}"></script>

		<!-- HoldOn.js -->
		<script src="{{ asset('components/hold-on/HoldOn.min.js') }}"></script>

		<!-- Moment.js -->
		<script src="{{ asset('components/moment/min/moment.min.js') }}"></script>
		
		<script type="text/javascript">
			{{--var routeConsulta 		= '{!! route('consulta.index') !!}';	--}}		
			var routeBase           = '{!! url("") !!}';
			var maskFecha 			= new Inputmask("dd/mm/yyyy", {"placeholder": "DD/MM/AAAA"});
			var permissionUser		= '{!! \Auth::check() !!}';
			var tituloModal 		= $('#modal-titulo');
			var bodyModal 			= $('.modal-body');
			var footerModal			= $('.modal-footer');
			var modal 				= $('#modal');
			{{--var prueba = ( permissionUser )? @json(\Auth::user()->getPermissionsViaRoles()->pluck('name')) : 'No tiene' ;--}}
			
			
			$.AdminLTESidebarTweak = {};

			$.AdminLTESidebarTweak.options = {
			    EnableRemember: true,
			    NoTransitionAfterReload: false
			    //Removes the transition after page reload.
			};

			$(function (){
			    "use strict";

			    function setCookie(value) {
			        let name = 'toggleState';
			        let days = 365;
			        let d = new Date;
			        d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
			        document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
			    }

			    $("body").on("collapsed.pushMenu", function () {
			        if ($.AdminLTESidebarTweak.options.EnableRemember) {
			            setCookie('closed');
			        }
			    }).on("expanded.pushMenu", function () {
			        if ($.AdminLTESidebarTweak.options.EnableRemember) {
			            setCookie('opened');
			        }
			    });
				// Agrega el token a la cabecera para poder mandar los formularios via ajax.
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
			});
		</script>

		{!! HTML::script('js/funcionesgral.js') !!}
		{!! HTML::script('js/curp.js') !!}

		@yield('script')	

</html>