@extends('almacen.index')

@section('secciones_almacen')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-book">
                    <span style="font-family: 'Roboto';">Pólizas</span>
                </h2>
            </div>
            <b>Generación de pólizas para almacén y contabilidad </b>
        </div>
        <div class="col-sm-6">
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
            <h4 class="pull-left nombre-ventana">Ingrese los datos del periodo para generar la póliza</h4>

            <div class="pull-right">
                <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                    <h3 class="fas fa-home"></h3>
                </a>
            </div>
        </div>
    </div>
    <p></p>
</div>

<div class="container poliza-box">
    <form action="{{route('almacen.index')}}">
        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                 <div class="form-check">
                    <input class="form-check-input checkPoliza" type="checkbox" id="polizaAlmacen">
                    <label class="form-check-label" for="polizaAlmacen">
                    Póliza de almacén
                    </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input checkPoliza" type="checkbox" id="polizaConta">
                        <label class="form-check-label text-wrap" style="width: 200px; " for="polizaConta">
                        Póliza para contabilidad y presupuesto
                        </label>
                    </div>
                </div>
            <div class="col col-lg-6">
                    <div class="container-fluid" style="align-items: center;">
                    <label class="text-nowrap col-sm-6" style=" padding-right: 15px;">No. Mes</label>
                    <div class="input-group spinner col-sm-6" style="width: 50%;">
                        <input name="numMes" id="no_mes" type="text" class="form-control" value="1" required>
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
                <div class="container-fluid" style="align-items: center;">    
                    <label class="text-nowrap col-sm-6">Año</label>
                    <select name="year" class="input-group spinner col-sm-6" style="width: 50%;" required>
                        <option value="" dir="ltr">Año...</option>
                        <option value="2019" dir="ltr">2019</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="align-items: center; margin-bottom: 10px; margin-top: 10px;">
            <div class="container-fluid pull-right" style="display: inline-flex; align-items: center; padding-right: 5%">
                <button style="margin-right: 3%;" type="button" id="btn-cancelar" class="btn btn-cancel">Cancelar</button>
                <button type="submit" id="btn-cerrar" class="btn btn-submit">Generar poliza</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{ asset('js/almacen/polizas.js') }}"></script>

@endsection