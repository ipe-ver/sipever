@extends('almacen.index')

@section('secciones_almacen')
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-file-invoice-dollar">
                    <span style="font-family: 'Roboto';">Facturas</span>
                </h2>
            </div>
            <b>Administración de facturas por compras de almacén </b>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 margin-tb header">
            <h4 class="pull-left nombre-ventana">Almacenar factura</h4>

            <div class="pull-right">
                <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                    <h3 class="fas fa-home"></h3>
                </a>
            </div>
        </div>
    </div>
    <p></p>
</div>



@endsection