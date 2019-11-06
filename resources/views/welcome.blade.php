@extends('adminlte::layouts.landing')


@section('content')

<div class="row">

    <div class="col-md-1"></div>
     
    <div class="col-md-10">
             
        <div class="box box-default">
            <div class="box-header with-border" >
            {{--<img src="{!! url('') !!}/img_system/banner_principal.png" style="width: 800px; height: 100px; display:block; margin:left;"> --}}
                {{--<i class="fa fa-bullhorn"></i>--}}

                {{--<h3 class="box-title">Valores del Mes</h3>--}}
            </div>
      
            <div class="box-body">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{!! url('') !!}/img_system/CARTEL-AGOSTO.jpg" style="width: 800px; height: 400px;">
                            <div class="carousel-caption" style="color:#641E16;">
                                <h3><strong>CÓDIGO DE CONFIDENCIALIDAD</strong></h3>
                            </div>	
                        </div>
                        <div class="item">
                            <img src="{!! url('') !!}/img_system/CARTEL-VOCACION-JULIO.jpg" style="width: 800px; height: 400px;">
                            <div class="carousel-caption" style="color:#641E16;">
                                <h3><strong>VOCACIÓN DE SERVICIO</strong></h3>
                            </div>	
                        </div>

                        <div class="item">
                            <img src="{!! url('') !!}/img_system/CARTEL-FEBRERO.jpg" style="width: 800px; height: 400px;">
                            <div class="carousel-caption" style="color:#641E16;">
                                <h3><strong>ÉTICA PÚBLICA</strong></h3>
                            </div>	
                        </div>
                    </div>

                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>

                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                    </a>

                    

                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-1"></div>


</div>

<div class="row">

    <div class="col-md-1"></div>

    <div class="col-md-5">
        <div class="box box-default">
            <div class="box-header with-border">
               

                
            </div>
     
            <div class="box-body">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>Calendario Oficial 2019</h3>

                        <p style="font-size:13px;">Días de descanso obligatorio para los empleados al servicio del poder ejecutivo del Edo. de Veracruz.</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{!! url('') !!}/img_system/calendario_oficial_2019.pdf" class="small-box-footer" target="_blank">Descargar <i class="fa fa-download"></i></a>
                </div>
            </div>
   
        </div>
    </div>

    <div class="col-md-5">
        <div class="box box-default">
            <div class="box-header with-border">
                

                
            </div>
     
            <div class="box-body">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Calendario de Nómina 2019</h3>
                        <h3></h3>

                        <p style="font-size:13px;">Entrega de oficios para justificar días para bono de puntualidad del personal activo.</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{!! url('') !!}/img_system/calendario_nomina_2019.pdf" class="small-box-footer" target="_blank">Descargar <i class="fa fa-download"></i></a>
                </div>
            </div>
   
        </div>
    </div>
     

    <div class="col-md-1"></div>


</div>






    
           
	
@endsection



     
