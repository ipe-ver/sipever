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
                    <input class="form-check-input" type="checkbox" value="" id="reporteValidacionConsumo">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="reporteValidacionConsumo">
                    Reporte para validación de consumo
                    </label>
                </div>
                <div class="form-check" style="display: flex;">
                    <input class="form-check-input" type="checkbox" value="" id="reporteConsDepto">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
                    Reporte de consumos por departamento
                    </label>
                </div>
                <div class="form-check" style="display: flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
                    Consumo de artículos por área
                    </label>
                </div>
                <div class="form-check" style="display: flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;"for="defaultCheck1">
                    Reporte auxiliar de almacén
                    </label>
                </div>
                <div class="form-check" style="display: flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
                    Consumos por artículo
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
                    Reporte final de existencias
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
                    Compras por artículo
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
                    Existencias por artículo
                    </label>
                </div>
                <div class="form-check" style="display: inline-flex;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label text-wrap" style="margin-left: 5px; width: 160px;" for="defaultCheck1">
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
                        <div class="input-group spinner col-md-5">
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
                        <div class="row">
                            <label style="width: 45px; padding-right: 50px; padding-left: 30px;" class="col-md-2">Año inicio</label>
                            <select name="year" class="spinner" style="margin-left: 7px; width: 55px;" required>
                                <option value="">Año...</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="col-lg-7 text-left" style="padding-right: 50px;">Mes fin</label>
                        <div class="input-group spinner col-md-5">
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
                        <div class="row" style="align-content: center;">
                            <label style="width: 45px; padding-right: 50px; padding-left: 30px;" class="col-md-2">Año fin</label>
                            <select name="year" class="spinner" style="margin-left: 7px; width: 55px;" required>
                                <option value="">Año...</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                    <div class="container-fluid">
                        <button class="btn btn-submit pull-right">Generar reporte</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection