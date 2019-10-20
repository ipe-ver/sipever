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
    <form action="{{route('almacen.reportes.generar')}}" method="POST">
        @csrf
        @method("POST")

        <div class ="row justify-content-md-center">
            <div class="col col-lg-4">
                <div>
                    <h4 class="separador">Reportes</h4>
                    <div class="form-check" style="display: flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="auxAlmacen" value="" id="reporteAuxAlmacen">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;"for="reporteAuxAlmacen">
                        Reporte auxiliar de almacén
                        </label>
                    </div>
                    <div class="form-check" style="display: flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="consDepto" value="" id="reporteConsDepto">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteConsDepto">
                        Reporte de consumos por departamento
                        </label>
                    </div>
                    <div class="form-check" style="display: inline-flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="existencias" value="" id="reporteExistencias">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteExistencias">
                        Reporte final de existencias
                        </label>
                    </div>
                    <div class="form-check" style="display: inline-flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="validConsumo" value="" id="reporteValidacionConsumo">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteValidacionConsumo">
                        Reporte para validación de consumo
                        </label>
                    </div>
                </div>
                <div>
                    <h4 class="separador">Concentrados</h4>
                    <div class="form-check" style="display: inline-flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="compArticulo" value="" id="comprasArticulo">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="comprasArticulo">
                        Compras por artículo
                        </label>
                    </div>
                    <div class="form-check" style="display: inline-flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="consAreaArt" value="" id="consumosAreaArt">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="consumosAreaArt">
                        Consumos por área y artículo
                        </label>
                    </div>
                    <div class="form-check" style="display: flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="consArticulo" value="" id="consumosArticulo">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="consumosArticulo">
                        Consumos por artículo
                        </label>
                    </div>
                    <div class="form-check" style="display: inline-flex;">
                        <input class="form-check-input checkReporte" type="checkbox" name="existArticulo" value="" id="existenciasArticulo">
                        <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="existenciasArticulo">
                        Existencias por artículo
                        </label>
                    </div>
                </div>
            </div>
            <div class ="col-lg-8">
                <div class="row">
                    <div class ="container-fluid" style="margin-top: 5%;">
                        <select id="selectDepto" class="form-control" name="depto" method="post">
                            <option value ="">Seleccione un departamento</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{$departamento->ubpp}}">{{$departamento->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class ="container-fluid" style="margin-top: 5%;">
                        <select id="selectOficina" class="form-control" name="oficina">
                            <option value ="">Seleccione una oficina</option>
                        </select>
                    </div>
                </div>
                <div id="reporteSingleton" style="margin-bottom: 5%;">
                    <div class="form-check">
                        <input id ="chckMes" class="form-check-input" type="checkbox" value="" id="checkPorMes">
                        <label class="form-check-label" for="chckMes">
                        Generar reporte de un solo mes
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label id="lblMesInicio" class="col-lg-7 text-left" style="padding-right: 50px;">Mes inicial</label>
                        <div id="groupMesInicio" class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%;">
                            <input id="inptMesInicio" name="numMesInicio" type="text" class="form-control" value="1" required style="padding-right: 15px;" readonly>
                            <div class="input-group-btn-vertical" style="margin-left: 10px;">
                                <button id="mesIniIncrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-up"></i>
                                </button>
                                <button id="mesIniDecrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>

                        <label id="lblYearInicio" class="col-lg-7 text-left" style="padding-right: 50px;">Año inicio</label>
                        <select id="selectYearInicio" name="yearInicio" class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%; text-align-last: right;" required>
                            <option value="" dir="ltr">Año...</option>
                            <option value="2019" dir="rtl">2019</option>
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label id="lblMesFin" class="col-lg-7 text-left" style="padding-right: 50px;">Mes fin</label>
                        <div id="groupMesFin" class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%;">
                            <input id="inptMesFin" name="mesFin" type="text" class="form-control" value="1" required style="padding-right: 15px;" readonly>
                            <div class="input-group-btn-vertical" style="margin-left: 10px;">
                                <button id="mesFinIncrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-up"></i>
                                </button>
                                <button id="mesFinDecrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>
                        <label id="lblYearFin" class="col-lg-7 text-left" style="padding-right: 50px;">Año fin</label>
                        <select id="selectYearFin"  name="yearFin" class="input-group spinner col-md-5" style="margin-left: 20%; width: 39.5%; text-align-last: right;">
                            <option value="" dir="ltr">Año...</option>
                            <option value="2019" dir="rtl">2019</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="padding-top: 40%;">
                    <div class="container-fluid">
                        <div class="pull-right">
                            <button type = "submit" class="btn btn-submit">Generar reporte</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{ asset('js/almacen/reportes.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/almacen/oficinas-depto.js') }}"></script>

@endsection