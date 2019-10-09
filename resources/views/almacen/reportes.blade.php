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
            <div class="col col-lg-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Póliza de almacén
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Póliza de almacén
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Póliza de almacén
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Póliza de almacén
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Póliza de almacén
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Póliza de almacén
                    </label>
                </div>
            </div>
            <div class ="col-lg-6">
                <div id="cosoPrueba">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkPorMes">
                        <label class="form-check-label" for="checkPorMes">
                        Generar reporte de un solo mes
                        </label>
                    </div>
                </div>
                <div class="row">
                    <label class="text-nowrap col-xs-4">No. Mes</label>
                    <div class="input-group spinner col-xs-3">
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
                <label class="text-nowrap" style="padding-right: 43.5px;">Año</label>
                <select name="year"class="spinner" style="text-align-last: right;" required>
                    <option value="" dir="ltr">Año...</option>
                    <option value="2019" dir="ltr">2019</option>
                </select>
                <div class="row">
                    <button>Coso</button>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection