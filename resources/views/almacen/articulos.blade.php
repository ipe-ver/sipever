@extends('almacen.index')

@section('secciones_almacen')
	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 margin-tb">
                <div class="row">
                    <h2 class=" col-sm-1 text-center text-nowrap fas fa-boxes">
                        <span style="font-family: 'Roboto';">Artículos</span>
                    </h2>
                </div>
                <p>Administración y Registro de artículos de Almacén </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 margin-tb header">
                <h4 class="pull-left nombre-ventana">Vista general de los artículos registrados</h4>

                <div class="pull-right">
                    <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                        <h3 class="fas fa-home"></h3>
                    </a>
                    <a style="margin-bottom: 10px;" class="btn btn-agregar"> Agregar</a>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="panel" style="background-color: transparent;">
                <div class = "pull-left">
                    <input class="input-busqueda"type="text" name="nombreArticulo" placeholder="Ingrese el nombre de un articulo a buscar">
                    <span>
                        <button class = "btn btn-agregar" type="button">Buscar</button>
                    </span>
                </div>

            </div>
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
    <div class="panel-group menu-scroll" id="accordion">
        @foreach ($articulos as $articulo)
        <div class="panel panel-menu">
            <div class="panel-heading">
                <div class="panel-title titulo-panel" id="headingOne">

                    	<div class=" col-sm-5 desc-cuenta pull-left">
                    		{{ $articulo->descripcion }}
                    	</div>
                    	<div class="col-xs-1 text-nowrap"> {{ $articulo->descripcion_u_medida }}</div>
                		@if($articulo->existencias > $articulo->stock_minimo)
                			<div class="col-sm-2 en_stock text-nowrap pull-center">
                				En Stock
                			</div>
                		@elseif($articulo->existencias <= $articulo->stock_minimo)
                			<div class="col-sm-2 stock_bajo text-nowrap text-left">
                				Stock bajo
                			</div>
                		@elseif($articulo->estatus == 0)
                			<div class="col-sm-2 de_baja text-nowrap pull-center">
                				De baja
                			</div>
                		@endif
                    	<div class="col-sm-3 desc-cuenta text-nowrap text-lowercase">{{$articulo->descripcion_cuenta}}</div>
                    	<div class="pull-right">
                            <button class = "btn btn-collapse" id="btn_editar" disabled="true">
                                <i class="fas fa-pen">  </i>
                            </button>
                            <button class="btn btn-collapse" id="btn_eliminar" disabled="true">
                                <i class="fas fa-trash-alt">  </i>
                            </button>
                            <button id="verArticulo" type="button" class="btn btn-left btn-collapse collapsed" data-toggle="collapse"  data-target="#collapseArticulo" aria-expanded="false">
                                <i id="iconoDesplegar" class="fas fa-caret-square-down desplegar"></i>
                            </button>

                    </div>
                </div>
            </div>
            <div id="collapseArticulo" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="container-fluid">
                        <form>
                          <div class="form-group">
                            <label for="articuloclave">Clave</label>
                            <input type="email" class="form-control small-field" id="articuloClave" aria-describedby="emailHelp" placeholder="Clave" value="{{$articulo->clave}}" disabled="true">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Descripcion" value="{{$articulo->descripcion}}">
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pull-right">
        @if($index > 0)
        <a class = "icon-ref" href="{{ route('almacen.articulos.next_page', $index-1) }}" title="">
            <h3 class="fas fa-chevron-circle-left"></h3>
        </a>
        @endif
        <a class="icon-ref" href="{{ route('almacen.articulos.next_page', $index+1) }}" title="">
            <h3 class="fas fa-chevron-circle-right"></h3>
        </a>
    </div>
<script type="text/javascript" src="{{ asset('js/articulos.js') }}"></script>
@endsection