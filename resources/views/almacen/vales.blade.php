@extends('almacen.index')

@section('secciones_almacen')
<link rel="stylesheet" type="text/css" href="{{asset('css/effects/modal.css')}}">
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
        <div id="messageCol" class="col-md-6">
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
                <a class="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
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
<div class="modal-loader" id="loader">
    <div class="sp-box">
        <div class="sp sp1"></div>
        <div class="sp sp2"></div>
        <div class="sp sp3"></div>
        <div class="sp sp4"></div>
    </div>
</div>
<div class="panel-group menu-scroll" id="accordion" aria-multiselectable="true">
    @foreach ($cabeceras as $cabecera)
    <div class="panel panel-default panel-menu">
        <div class="panel-heading titulo-panel" style="background-color: transparent;">
            <div class="panel-title" id="headingOne">
                <div class=" col-sm-2 desc-cuenta pull-left">
                    {{$cabecera->folio}}
                </div>

                @if ($cabecera->tipo == 1)
                <div class="col-sm-2 en_stock text-nowrap text-center">
                    Consumo
                </div>
                @elseif ($cabecera->tipo==3)
                <div class="col-sm-2 de_baja text-nowrap text-center">
                    Compra
                </div>
                @endif

                <div class="col-sm-3 text-center">{{$cabecera->fecha_recepcion}}</div>
                <div class="col-sm-5 desc-cuenta text-nowrap">{{$cabecera->departamento}}</div>
                <div class="pull-right">
                    <button name="verVale" type="button" class="btn btn-left btn-collapse collapsed" data-toggle="collapse" data-target="#collapseVale" data-parent="#accordion" onclick="getDetalles('{{$cabecera->tipo}}', '{{$cabecera->folio}}', this)">
                        <i id="iconoDesplegar" class="fas fa-caret-square-down desplegar"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="collapseVale" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table text-left" id="articulos_factura" name="detalle">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th width="400px">Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style="padding-left:1.5%; padding-right: 1.5%;">
                    <form id="submitForm" action="{{route('almacen.index')}}" class="submit-form">
                        @csrf
                        <div class="pull-left">
                            <table>
                                <tr>
                                    <th>Extemporáneo</th>
                                </tr>
                                <tr>
                                    <td style="display: inline-flex;">
                                        <div class="form-check" style="display: flex;">
                                            <label class="check-container">Si
                                                <input type="radio" name="tipo" value="1" required>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check" style="display: flex;">
                                            <label class="check-container">No
                                                <input type="radio" name="tipo" value="2">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button id="btnValidar" type="submit" class="btn-validar btn btn-submit pull-right">Validar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- The Modal -->
<div id="myModal" class="valid-modal">

    <!-- Modal content -->
    <div class="valid-modal-content">
        <div class="modal-header">
            <span id="closeModal" class="close">&times;</span>
            <h2>Validar orden</h2>
            <p>Ingrese las cantidades a entregar y después de click en aceptar</p>
        </div>
        <form action="{{route('almacen.vales.validarOrden')}}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="detalleValidar">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right" style="margin-top: 5px;">
                    <button id="cancelarValid" type="button" class="btn btn-cancel">Cancelar</button>
                    <button id = "validarOrden" type="submit" class="btn btn-submit">Aceptar</button>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="{{asset('js/almacen/vales.js')}}"></script>

@endsection