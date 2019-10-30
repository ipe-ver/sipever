@extends('almacen.index')

@section('secciones_almacen')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 margin-tb">
            <div class="row">
                <h2 class=" col-sm-1 text-center text-nowrap fas fa-layer-group">
                    <span style="font-family: 'Roboto';">Partidas</span>
                </h2>
            </div>
            <b>Administración y Registro de Partidas de Almacén </b>
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
            <h4 class="pull-left nombre-ventana">Vista general de las partidas registradas</h4>

            <div class="pull-right">
                <a class ="icon-ref" style="padding-right: 10px;" href="{{route('almacen.index')}}" title="">
                    <h3 class="fas fa-home"></h3>
                </a>
                @include('almacen.crear_partida')
                <a style="margin-bottom: 10px;" type="button" class="btn btn-agregar" data-toggle="modal" href="#createPartida"> Agregar</a>
            </div>
        </div>
    </div>
    <p></p>
</div>
<div class="panel-group menu-scroll" id="accordion" aria-multiselectable="true">
    @foreach ($partidas as $partida)
    <div class="panel panel-menu">
        <div class="panel-heading">
            <div class="panel-title titulo-panel" id="headingOne">
                	<div class=" col-xs-1 desc-cuenta pull-left">
                		{{ $partida->cta }}
                	</div>
                	<div class="col-xs-1 text-nowrap"> {{ $partida->scta }}</div>
                    <div class="col-xs-1 text-nowrap">{{ $partida->sscta}} </div>
                	<div class="col-sm-5 desc-cuenta text-nowrap">{{$partida->nombre}}</div>
                	<div class="pull-right">
                        <button class = "btn btn-collapse btn-edit" id="btn_editar" disabled="true">
                            <i class="fas fa-pen">  </i>
                        </button>
                        <button class="btn btn-collapse btn-delete" id="btn_eliminar" data-toggle="modal" data-target="#eliminarPartida" disabled >
                            <i class="fas fa-trash-alt">  </i>
                        </button>
                        <button id="verPartida" type="button" class="btn btn-left btn-collapse collapsed" data-toggle="collapse"  data-target="#collapsePartida" aria-expanded="false" data-parent="#partidas">
                            <i id="iconoDesplegar" class="fas fa-caret-square-down desplegar"></i>
                        </button>
                </div>
            </div>
        </div>

        <div class="modal fade modal-eliminar" id="eliminarPartida" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="eliminarPartidaLabel" aria-hidden="true">
            <div class="modal-dialog articulo-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="eliminarPartidaLabel">Eliminar Partida</h3>
                    </div>
                    <form action="{{route('almacen.partidas.eliminar', $partida->id)}}" method="get" accept-charset="utf-8">
                        <div class="modal-body">
                            <h5>Para eliminar la partida {{$partida->nombre}} debe reasignar sus artículos a otra partida</h5>
                            <select name="nombre" class="col-sm-6 form-control" dir="ltr" id="articuloGrupo" required >
                                <option value="">Seleccione una partida...</option>
                                @foreach($partidas as  $partida_aux)
                                    @if($partida_aux->nombre != $partida->nombre)
                                        <option value="{{$partida_aux->nombre}}">{{$partida_aux->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-5 colm-form-btns pull-right">
                                <div class="pull-right">
                                    <button type="button" id="btn-cancelar" data-dismiss="modal" class="btn btn-cancel">Cancelar</button>
                                    <button type="submit" id="btn-guardar" class="btn btn-submit">Eliminar Partida</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="collapsePartida" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="container-fluid">
                    <form action="{{route('almacen.partidas.actualizar',$partida->id)}}">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <label class="col-md-2" for="partidaCta">CTA</label>
                            <label class="col-md-2 " style="margin-left: 20px;" for="partidaScta">SCTA</label>
                            <label class="col-md-2 colm-form" for="partidaSscta">SSCTA</label>
                            <label class="col-md-6 text-left colm-form" for="partidaNombre">Nombre</label>
                        </div>
                        <div class="row">
                            <input name="cta" type="text" class="col-sm-1 colm-form form-control" id="partidaCta" placeholder="Cuenta" value="{{$partida->cta}}" disabled="true" required>
                            <input name="scta" type="text" class="col-sm-1 colm-form-md form-control" id="partidaScta" placeholder="SubCuenta" value="{{$partida->scta}}" disabled="true" required>
                            <input name="sscta" class="col-sm-2 colm-form form-control" dir="ltr" id="partidaSscta" placeholder="Sub-SubCuenta" value = "{{$partida->sscta}}" disabled required>
                            <input name="nombre" type="text" class="col-md-6 colm-form form-control" id="partidaNombre" placeholder="Nombre" value="{{$partida->nombre}}" disabled="true">
                        </div>
                        <div class="row">
                            <label class="col-sm-2 colm-form-md text-center" for="partidaGrupo">Grupo</label>
                            <label class="col-md-3" for="partidaCtaArm">Cta Armonizada</label>
                            <label class="col-md-6 desc-cuenta text-nowrap" style="margin-left: 10px;" for="partidaNombreArm">Nombre armonizado</label>
                        </div>
                        <div class="row">
                            <input type="text" class="col-sm-2 colm-form-md form-control" id="partidaGrupo" name="grupo" value="{{$partida->grupo}}" placeholder="Grupo" disabled="true">
                            <input name="ctaarmo" type="text" class="col-md-3 colm-form-md form-control" id="partidaCtaArm" placeholder="Cuenta Arm." value="{{$partida->ctaarmo}}" disabled="true" required>
                            <input name="nomarmo" type="text" class="col-md-6 colm-form form-control" id="partidaNombreArm" placeholder="Nombre Arm." value="{{$partida->nomarmo}}" disabled required>
                            <div class="col-md-5 colm-form-btns pull-right">
                                <div class="pull-right">
                                    <button type="button" id="btn-cancelar" class="btn btn-cancel" disabled="true">Cancelar</button>
                                    <button type="submit" id="btn-guardar" class="btn btn-submit" disabled="true">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<script type="text/javascript" src="{{ asset('js/almacen/partidas.js') }}"></script>
@endsection