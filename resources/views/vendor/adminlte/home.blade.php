@extends('adminlte::layouts.landing')

@section('style')

{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}

<style>  
  
</style>

@endsection

@section('content')
 
<div class="row">
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
    <div class="col-md-10">

    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center; font-size:38px; background-color: #948C75;"><strong>Bienvenido</strong></div>
                <div class="panel-body">

                    <div class="box box-widget widget-user-2" style="background-color: #F3EFE0;">

                        <!--CABECERA -->
                        <div class="widget-user-header bg-default">
                            <div class="widget-user-image">
                                {{ HTML::image('components/admin-lte/dist/img/avatar5.png', 'User Avatar', array('class' => 'img-circle')) }}
                            </div>
                            <h1 class="widget-user-username" style="font-size:28px;">
                                 {{Auth::user()->empleados->nombre}} {{Auth::user()->empleados->apellido_materno}} {{Auth::user()->empleados->apellido_paterno}}  
                                
                            </h1>
                            <h5 class="widget-user-desc" style="font-size:20px;">
                                @if(Auth::user()->hasRole('admin'))
                                    <div>Acceso como Administrador</div>
                                
                                @elseif(Auth::user()->hasRole('almacen_admin')) 
                                    <div>Acceso como Administrador de Almacén</div>

                                @elseif(Auth::user()->hasRole('almacen_capturista')) 
                                    <div>Acceso como Capturista de Almacén</div>    
                                    
                                @else(Auth::user()->hasRole('almacen_oficinista')) 
                                    <div>Acceso como Oficinista de Almacén</div>
                                
                                @endif
                            </h5>
                        </div><!-- /. widget-user-header bg-yellow -->
                    </div>  <!-- ./ box box-widget widget-user-2-->  
                </div> <!-- ./ panel-body-->  

            </div> <!-- ./ panel-default-->  
        </div><!-- ./ panel panel -default-->  
  
    </div> <!-- ./ col-md-10 -->
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
</div> <!-- ./ row -->


@endsection

@section('script')

@endsection







