@extends('adminlte::layouts.landing')
@section('content')
@if(Auth::user()->hasRole('almacen_admin') || Auth::user()->hasRole('almacen_capturista') || Auth::user()->hasRole('almacen_oficinista'))
	<link href="{{ asset('css/almacen.css') }}" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/effects/loader.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/app-landing.js')}}"></script>
	<div class=" menu-almacen panel-default pull-top">
	    <div class="container-fluid">
		    <div class="row">
	            @if(Auth::user()->hasRole('almacen_admin'))
		           	<div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.vales.index') !!}">
							<i class="fas fa-inbox"></i>
							<span>Vales</span>
						</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.reportes.index') !!}">
						<i class="fas fa-clipboard"></i>
						<span>Reportes</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.polizas.index') !!}">
						<i class="fas fa-book"></i>
						<span>Polizas</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.periodo.index') !!}">
						<i class="fas fa-lock"></i>
						<span>Cerrar mes</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.articulos.index') !!}">
						<i class="fas fa-boxes"></i>
						<span>Artículos</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.partidas.index') !!}">
						<i class="fas fa-layer-group"></i>
						<span>Partidas</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.facturas.index') !!}">
						<i class="fas fa-file-invoice-dollar"></i>
						<span>Facturas</span>
					</a>
		           </div>
		       @elseif(Auth::user()->hasRole('almacen_capturista'))
		       		<div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.vales.index') !!}">
							<i class="fas fa-inbox"></i>
							<span>Vales</span>
						</a>
		           </div>
		           <div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.articulos.index') !!}">
							<i class="fas fa-boxes"></i>
							<span>Artículos</span>
						</a>
		           </div>
		           <div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.partidas.index') !!}">
							<i class="fas fa-layer-group"></i>
							<span>Partidas</span>
						</a>
		           </div>
		           <div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.facturas.index') !!}">
							<i class="fas fa-file-invoice-dollar"></i>
							<span>Facturas</span>
						</a>
		           </div>
		       @else
		       		@include('almacen.login')
		       		<div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.vales.index') !!}">
							<i class="fas fa-inbox"></i>
							<span>Vales</span>
						</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.reportes.index') !!}">
						<i class="fas fa-clipboard"></i>
						<span>Reportes</span>
					</a>
		           </div>
		           <script type="text/javascript" src="{{asset('js/almacen/login_oficina.js')}}"></script>
	           @endif
	        </div>
	    </div>
	</div>

	@yield('secciones_almacen')
@else
	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 margin-tb">
                <div class="row">
                    <h2 class=" col-sm-1 text-center text-nowrap fas fa-box-open">
                        <span style="font-family: 'Roboto';">Sin acceso</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 margin-tb header">
                <h3 class="pull-left nombre-ventana">Porfavor inicie sesión con una cuenta autorizada para tener acceso a este módulo</h3>
            </div>
        </div>
        <p></p>
    </div>
@endif	
@endsection
