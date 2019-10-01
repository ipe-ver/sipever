@extends('adminlte::layouts.landing')

@section('content')
<link href="{{ asset('css/almacen.css') }}" rel="stylesheet" type="text/css" >
<!--<script src="https://kit.fontawesome.com/002f2479d1.js" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<div class=" panel-menu panel-default pull-top">
	<div class="col-md-12">
	    <div class="container-fluid">
		    <div class="row">
	            @if(Auth::user()->name == 'almacen_admin')
		           	<div class="col-xs-2">
						<a class="nombre_modulo" href="{!! route('almacen.index') !!}">
							<i class="fas fa-inbox"></i>
							<span>Vales</span>
						</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.index') !!}">
						<i class="fas fa-file-alt"></i>
						<span>Reportes</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.index') !!}">
						<i class="fas fa-book"></i>
						<span>Polizas</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.index') !!}">
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
					<a class="nombre_modulo" href="{!! route('almacen.index') !!}">
						<i class="fas fa-layer-group"></i>
						<span>Partidas</span>
					</a>
		           </div>
		           <div class="col-xs-2">
					<a class="nombre_modulo" href="{!! route('almacen.index') !!}">
						<i class="fas fa-clipboard"></i>
						<span>Facturas</span>
					</a>
		           </div>
	           @endif
	        </div>
	    </div>
	</div>
</div>

@yield('secciones_almacen');

@endsection