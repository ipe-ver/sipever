@extends('almacen.index')

@section('secciones_almacen')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-clipboard">
                    <span style="font-family: 'Roboto';">Reportes</span>
                </h2>
            </div>
            <b>Administración de reportes de Almacén </b>
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
            <h4 class="pull-left nombre-ventana">Generación de reportes de almacén</h4>

            <div class="pull-right">
                <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                    <h3 class="fas fa-home"></h3>
                </a>
            </div>
        </div>
    </div>
    <p></p>
</div>

<div class = "container reportes-box">
    <form action="{{route('almacen.index')}}">
        <div class ="row justify-content-md-center">
            <div class="col col-lg-4">
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="reporteValidacionConsumo">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteValidacionConsumo">
                    Reporte para validación de consumo
                    </label>
                </div>
                <div class="form-check" style="display: flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="reporteConsDepto">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteConsDepto">
                    Reporte de consumos por departamento
                    </label>
                </div>

                <div class="form-check" style="display: flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="reporteAuxAlmacen">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;"for="reporteAuxAlmacen">
                    Reporte auxiliar de almacén
                    </label>
                </div>
                <div class="form-check" style="display: flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="consumosArticulo">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="consumosArticulo">
                    Consumos por artículo
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="reporteExistencias">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteExistencias">
                    Reporte final de existencias
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="comprasArticulo">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="comprasArticulo">
                    Compras por artículo
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="existenciasArticulo">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="existenciasArticulo">
                    Existencias por artículo
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input checkReporte" type="checkbox" value="" id="consumosAreaArt">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="consumosAreaArt">
                    Consumos por área y artículo
                    </label>
                </div>
            </div>
            <div class ="col-lg-8">
                <div id="cosoPrueba">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkPorMes">
                        <label class="form-check-label" for="checkPorMes">
                        Generar reporte de un solo mes
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-lg-7 text-left" style="padding-right: 50px;">Mes inicial</label>
                        <div class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%;">
                            <input name="numMes" id="no_mes" type="text" class="form-control" value="1" required style="padding-right: 15px;">
                            <div class="input-group-btn-vertical" style="margin-left: 10px;">
                                <button id="mesIncrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-up"></i>
                                </button>
                                <button id="mesDecrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>

                        <label class="col-lg-7 text-left" style="padding-right: 50px;">Año inicio</label>
                        <select name="year" class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%;" required>
                            <option value="">Año...</option>
                            <option value="2019">2019</option>
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label class="col-lg-7 text-left" style="padding-right: 50px;">Mes fin</label>
                        <div class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%;">
                            <input name="numMes" id="no_mes" type="text" class="form-control" value="1" required style="padding-right: 15px;">
                            <div class="input-group-btn-vertical" style="margin-left: 10px;">
                                <button id="mesIncrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-up"></i>
                                </button>
                                <button id="mesDecrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>
                        <label class="col-lg-7 text-left" style="padding-right: 50px;">Año fin</label>
                        <select name="year" class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%;" required>
                            <option value="">Año...</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="padding-top: 50%;">
                    <div class="container-fluid">
                        <div class="pull-right">
                            <button class="btn btn-cancel">Cancelar</button>
                            <button class="btn btn-submit">Generar reporte</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{ asset('js/almacen/reportes.js') }}"></script>


@endsection