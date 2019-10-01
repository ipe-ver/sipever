@extends('almacen.index')

@section('secciones_almacen')
<script type="text/javascript" src="{{ asset('js/articulos.js') }}"></script>
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <i class="fas fa-boxes"> </i>
                <h2>Artículos</h2>
            </div>
            <p>Administración y Registro de artículos de Almacén </p>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert-container" id="contenedor-alert">
            <div class="alert success">
                <span class="closebtn">&times;</span>
                <p id="test">{{ $message }}</p>
            </div>
        </div>
    @elseif ($errors->any())
        <div class="alert-container" id="contenedor-alert">
            <div class="alert alert-danger">
                <span class="closebtn">&times;</span>
                <strong>Error</strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
    @elseif ($message = Session::get('warning'))
        <div class="alert-container" id="contenedor-alert">
            <div class="alert warning">
                <span class="closebtn">&times;</span>
                <p id="test">{{ $message }}</p>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb header">
            <h4 class="pull-left nombre-ventana">Vista general de los artículos registrados</h4>
            @include('usuarios.create')
            <div class="pull-right">
                <a class="btn btn-agregar" data-toggle="modal" href="#createUsuario"> Agregar</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="panel-group" id="accordion">
                @foreach ($articulos as $articulo)
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title" id="headingOne">
                            <p class="titulo-panel">
                            	<div class="pull-left">
                            		{{ $articulo->descripcion }}
                            	</div>
                            	<div class="col-md-2"> {{ $articulo->descripcion_u_medida }}</div>
                            	<div class="col-md-2">
                            		@if($articulo->isStock == 1)
                            			<div class="container en_stock">
                            				<p>En Stock</p>
                            			</div>
                            		@elseif($articulo->isStock == 2)
                            			<div class="container stock_bajo">
                            				<p>Stock bajo</p>
                            			</div>
                            		@elseif($articulo->estatus == 0)
                            			<div class="container de_baja">
                            				<p>De baja</p>
                            			</div>
                            		@endif
                            	</div>
                            	<div class="col-md-2">{{$articulo->descripcion_cuenta}}</div>
                            	@stack('botones');	
                                <button id="verArticulo" class="btn btn-left pull-right btn-usuario" data-toggle="collapse" data-target="#collapseArticulo" aria-expanded="true" aria-controls="collapseOne">
                                    <i id="iconoDesplegar" class="fas fa-chevron-circle-down desplegar"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                    <div id="collapseArticulo" class="panel-collapse collapse in">
                        <div class="panel-body">

                        	@push('botones')
                        		<button class = "btn" id="btn_editar">
									<i class="fas fa-pen">  </i>
								</button>
								<button class="btn" id="btn_eliminar">
									<i class="fas fa-trash-alt">  </i>
								</button>
                        	@endpush

                        	<div class="container">
                        		
                        	</div>

                            <!--<table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th width="280px">Opciones</th>
                                </tr>
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellidoP }}</td>
                                    <td>{{ $usuario->apellidoM }}</td>
                                    <td>
                                        <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('usuarios.show',$usuario->id) }}">Mostrar</a>

                                            <a class="btn btn-primary" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>-->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection