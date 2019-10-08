@extends('adminlte::layouts.landing')

@section('content')
<link href="{{ asset('css/almacen.css') }}" rel="stylesheet" type="text/css" >
<div class=" menu-almacen panel-default pull-top">

	    <div class="container-fluid">
		    <div class="row">
	            @if(Auth::user()->name == 'almacen_admin')
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
	           @endif
	        </div>
	    </div>

</div>

@yield('secciones_almacen')

@endsection