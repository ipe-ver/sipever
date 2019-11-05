@extends('almacen.index')

@section('secciones_almacen')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-lock">
                    <span style="font-family: 'Roboto';">Cerrar mes</span>
                </h2>
            </div>
            <b>Cierre mensual y cálculo de afectaciones</b>
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
            <h4 class="pull-left nombre-ventana">Ingrese los datos del mes que desea cerrar</h4>

            <div class="pull-right">
                <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                    <h3 class="fas fa-home"></h3>
                </a>
            </div>
        </div>
    </div>
    <p></p>
</div>

<div class="container mes-box">
    <div class="modal-loader" id="loader">
        <div class="sp-box">
            <div class="sp sp1"></div>
            <div class="sp sp2"></div>
            <div class="sp sp3"></div>
            <div class="sp sp4"></div>
        </div>
    </div>
    <form action="{{route('almacen.periodo.cerrar')}}" method = "POST">
        @csrf
        @method("POST")
        <div class="col-lg-12" style="text-align-last: center;">
            <div class="row">
                <div class="col col-md-12 container-fluid" style="align-items: center;">
                    <label class="text-nowrap">No. Mes</label>
                    <div class="container-fluid" style="display: inline-block; text-align-last: center;vertical-align: middle;">
                        <div class="input-group spinner">
                            <input name="numMes" id="no_mes" type="text" class="form-control" value="1" required readonly>
                            <div class="input-group-btn-vertical">
                                <button id="mesIncrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-up"></i>
                                </button>
                                <button id="mesDecrement" class="btn btn-default" type="button">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10%;">
                <div class="col col-md-12 container-fluid"  style="align-items: center;">
                    <label class="text-nowrap" style="padding: 2.5%;">Año</label>
                    <div class="container-fluid" style="display: inline-block; text-align-last: center;vertical-align: middle;">
                        <select name="year"class="spinner" style="text-align-last: right;" required>
                        <option value="" dir="ltr">Año...</option>
                        <option value="2019" dir="ltr">2019</option>
                    </select>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col col-md-12 container-fluid">
                <button style="margin-right: 3%;" type="button" id="btn-cancelar" class="btn btn-cancel">Cancelar</button>
                <button type="submit" id="btn-cerrar" class="btn btn-submit">Cerrar mes</button>
            </div> 
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{ asset('js/almacen/cierre-mes.js') }}"></script>

@endsection