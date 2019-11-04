@extends('almacen.index')

@section('secciones_almacen')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-file-invoice-dollar">
                    <span style="font-family: 'Roboto';">Facturas</span>
                </h2>
            </div>
            <b>Administración de facturas por compras de almacén </b>
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

@include('almacen.facturas.agregar_articulo')

<div class="container factura-box">
    <p class="header" style="font-weight: bold; font-size: 17px; color: grey;">Nueva factura</p>
    <form action='{{route('almacen.facturas.registrar')}}' method="POST">
        @csrf
        @method('POST')
        <div class="row" style="padding: 1.5%;">
            <div class="col-sm-4" style="max-width: 12%;">
                <div class="text-center">
                    <label for="noFactura">
                        <p>No. de factura</p>
                    </label>
                </div>
                <input type="text" name="noFactura" placeholder="Numero de factura" class="form-control" id="noFactura" required>
            </div>
            <div class="col-sm-3" style="max-width: 10%;">
                <div class="text-center">
                    <label for="subTotal">
                        <p>Subtotal</p>
                    </label>
                </div>
                <input type="text" name="subtotal" placeholder="Subtotal" class="form-control" id="subtotal" readonly required>
            </div>
            <div class="col-sm-3" style="max-width: 9%;">
                <div class="text-center">
                    <label for="iva">
                        <p>IVA %</p>
                    </label>
                </div>
                <input type="number" name="iva" placeholder="IVA" class="form-control" value="0" id="iva" min="1" required>
            </div>
            <div class="col-sm-3" style="max-width: 11%;">
                <div class="text-center">
                    <label for="total">
                        <p>Total</p>
                    </label>
                </div>
                <input type="text" name="total" placeholder="Total" value="0" class="form-control" id="total" readonly>
            </div>
            <div class="col-sm-3" style="max-width: 18%;">
                <div class="text-center">
                    <label for="fecha_facturacion" class="text-nowrap">
                        <p>Fecha de facturación</p>
                    </label>
                </div>
                <input type="date" name="fecha_facturacion" min="2000-01-01" class="form-control" id="fecha_facturacion" required>
            </div>
            <div class="col-sm-3" style="max-width: 18%;">
                <div class="text-center">
                    <label for="fecha_ingreso" class="text-nowrap">
                        <p>Fecha de ingreso</p>
                    </label>
                </div>
                <input type="date" name="fecha_ingreso" min="2000-01-01" class="form-control" id="fecha_ingreso" required>
            </div>
            <div class="col-md-4" style="max-width: 22%;">
                <div>
                    <label for="selectProveedor" class="text-nowrap">
                        <p>Proveedor</p>
                    </label>
                </div>
                <select id="selectProveedor" class="form-control" name="proveedor" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{$proveedor->nombre}}">{{$proveedor->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="articulos_factura">
                    <tr>
                        <th>Clave</th>
                        <th width="500px">Descripcion</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="padding:3%;">
            <a id="btnAgregarArticulo" type="button" class="btn btn-agregar pull-left" data-toggle="modal" href="#agregarArticulo"> Agregar articulo</a>
            <button id="btnNuevaFactura" type="submit" class="btn btn-submit pull-right">Guardar</button>
        </div>
    </form>
</div>


<script type="text/javascript" src="{{asset('js/almacen/facturas.js')}}"></script>
<script type="text/javascript" src="{{asset('js/almacen/partidas-articulo.js')}}"></script>

@endsection