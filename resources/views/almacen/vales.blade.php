@extends('almacen.index')

@section('secciones_almacen')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-inbox">
                    <span style="font-family: 'Roboto';">Vales</span>
                </h2>
            </div>
            <b>Administración y registro de vales de consumo de Almacén </b>
        </div>
        <div class="col-md-6">
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
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 margin-tb header">
            <h4 class="pull-left nombre-ventana">Vista de los vales enviados sin validar</h4>

            <div class="pull-right">
                <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                    <h3 class="fas fa-home"></h3>
                </a>
            </div>
        </div>
    </div>
    <p></p>
</div>
<div class="row">
    <div class="col-md-12">
        <div class=" col-sm-2 desc-cuenta text-center">
            <label>Folio</label>
        </div>
        <div class="col-sm-2 text-nowrap text-center">
            <label>Tipo de vale</label>
        </div>
        <div class="col-sm-3 text-center">
            <label>Fecha de movimiento</label>
        </div>
        <div class="col-sm-3 desc-cuenta text-center">
            <label>Oficina</label>
        </div>
    </div>
</div>
<div class="panel-group menu-scroll" id="accordion">
    <div class="panel panel-menu">
        <div class="panel-heading">
            <div class="panel-title titulo-panel" id="headingOne">
                    <div class=" col-sm-2 desc-cuenta pull-left">
                        COMP20191108
                    </div>
                    <div class="col-sm-2 en_stock text-nowrap text-center">
                        Común
                    </div>
                    <div class="col-sm-3 text-center">07/09/2019</div>
                    <div class="col-sm-3 desc-cuenta text-nowrap">DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN</div>
                    <div class="pull-right">
                        <button class = "btn btn-collapse btn-edit" id="btn_editar" disabled="true">
                            <i class="fas fa-pen">  </i>
                        </button>
                        <button class="btn btn-collapse btn-delete" id="btn_eliminar" disabled >
                            <i class="fas fa-trash-alt">  </i>
                        </button>
                        <button id="verArticulo" type="button" class="btn btn-left btn-collapse collapsed" data-toggle="collapse"  data-target="#collapseArticulo">
                            <i id="iconoDesplegar" class="fas fa-caret-square-down desplegar"></i>
                        </button>

                </div>
            </div>
        </div>
        <div id="collapseArticulo" class="collapse panel-collapse ">
            
        </div>
    </div>
</div>

@endsection