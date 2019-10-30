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
<div class="panel-group menu-scroll" id="accordion" aria-multiselectable="true">
    <div class="panel panel-default panel-menu">
        <div class="panel-heading">
            <div class="panel-title titulo-panel" id="headingOne">
                    <div class=" col-sm-2 desc-cuenta pull-left">
                        CONS20191108
                    </div>
                    <div class="col-sm-2 en_stock text-nowrap text-center">
                        Consumo
                    </div>
                    <div class="col-sm-3 text-center">07/09/2019</div>
                    <div class="col-sm-5 desc-cuenta text-nowrap">DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN</div>
                    <div class="pull-right">
                        <button id="verVale" type="button" class="btn btn-left btn-collapse collapsed" data-toggle="collapse"  data-target="#collapseVale" data-parent="#valesAccordion">
                            <i id="iconoDesplegar" class="fas fa-caret-square-down desplegar"></i>
                        </button>
                </div>
            </div>
        </div>
        <div id="collapseVale" class="collapse panel-collapse ">
                <div class="panel-body">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" id="articulos_factura">
                                    <tr>
                                        <th>Clave</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Importe</th>
                                    </tr>
                                    <tr>
                                        <td>1302</td>
                                        <td>ABRAZADERA THORSMAN PARA CABLE PLANO TC 3 X 5 C/100 PZAS.</td>
                                        <td>12</td>
                                        <td>15.60</td>
                                        <td>187.2</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left:1.5%; padding-right: 1.5%;">
                        <form id="valeForm" action="{{route('almacen.index')}}">
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
    <div class="panel panel-default panel-menu">
        <div class="panel-heading">
            <div class="panel-title titulo-panel" id="headingTwo">
                    <div class=" col-sm-2 desc-cuenta pull-left">
                        COMP20191108
                    </div>
                    <div class="col-sm-2 de_baja text-nowrap text-center">
                        Compra
                    </div>
                    <div class="col-sm-3 text-center">07/09/2019</div>
                    <div class="col-sm-5 desc-cuenta text-nowrap">DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN</div>
                    <div class="pull-right">
                        <button id="verVale" type="button" class="btn btn-left btn-collapse collapsed" data-toggle="collapse"  data-target="#collapseVale" data-parent="#valesAccordion">
                            <i id="iconoDesplegar" class="fas fa-caret-square-down desplegar"></i>
                        </button>

                </div>
            </div>
        </div>
        <div id="collapseVale" class="collapse panel-collapse ">
            <div class="panel-body">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" id="articulos_factura">
                                    <tr>
                                        <th>Clave</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Importe</th>
                                    </tr>
                                    <tr>
                                        <td>-----</td>
                                        <td>Calculadora cuántica</td>
                                        <td>1</td>
                                        <td>-----</td>
                                        <td>----</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left:1.5%; padding-right: 1.5%;">
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
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="valid-modal">

  <!-- Modal content -->
  <div class="valid-modal-content">
    <div class="modal-header">
        <span id="closeModal" class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>

<script src="{{asset('js/almacen/vales.js')}}"></script>

@endsection