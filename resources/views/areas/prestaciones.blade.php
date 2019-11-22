@extends('adminlte::layouts.landing')

@section('style')
	
{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}

  <style>
    .boton{
		width:150px;
  		height:150px;
		border: none;
		background: #00c375;
		color: #f2f2f2;
		border-radius: 500px;
		position: relative;
	}
	.boton:hover{
		border: none;
		opacity: 0.50;
	    -moz-opacity: .50;
	    filter:alpha (opacity=50);
	}
	button{
		outline:none;
	}
    
  .img{
		  width:50px;
  		height:50px;
	}
  </style>
@endsection

@section('content')
 
<div class="row">
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
    <div class="col-md-10">

    <div class="box box-widget widget-user-2">

      <!--CABECERA -->
      <div class="widget-user-header bg-warning">
        <div class="widget-user-image">
          {{ HTML::image('components/admin-lte/dist/img/avatar5.png', 'User Avatar', array('class' => 'img-circle')) }}
        </div>
        <h1 class="widget-user-username">
          MAESTRO 
          <code class="pull-right">
           PRESTACIONES ECONOMICAS
          </code>
        </h1>
        <h5 class="widget-user-desc">JEFE DE OFICINA DE PRESTACIONES ECONOMICAS</h5>
      </div><!-- /. widget-user-header bg-yellow -->

      <!--COLLAPSE DE FORMATOS DE PERMISOS -->     
      <div class="box box-solid">
          <div class="box-body">

            <div class="box-group" id="accordion">

              <!-- PRIMER COLLAPSE DE OBJETIVOS-->
              <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Objetivo
                      </a>
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <p style="font-size:20px; text-align:justify;"> Desarrollar e implementar los sistemas de información que requiere la Institución para automatizar sus procesos, 
                          además actualizar y mantener en buen funcionamiento aquellos que están en producción.</p>
                    </div>
                </div><!-- ./ collapseOne-->
              </div>  <!-- ./ panel box box-primary-->
              <!-- ./ PRIMER COLLAPSE DE OBJETIVOS-->

              <!-- SEGUNDO COLLAPSE DE FUNCIONES -->
              <div class="panel box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Descargar Formatos
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="box-body">
                    
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab"><strong>FORMATOS</strong></a></li>
                    </ul>
                    <br>

                      <div class="tab-content">
                        
                        <!-- PRIMER TAB-->
                        <div class="tab-pane active" id="tab_1">

                          <!-- PRIMERA LINEA DE FORMATOS DE PERMISOS -->  
                          <table class="table table-bordered">
                            <div class="timeline-body">   
                              <div class="col-md-3">
                                <a href="{!! url('') !!}/files/Prestaciones/PCP Activo.pdf" target="_blank"><button class="boton" style="background: #FF9900;"><img class="img" src="{!! url('') !!}/img_download/PE/Domiciliacion.png"/><h5 style="font-size: 18px;"><strong>PCP <br>Activo</strong></h5></button></a>
                              </div>
                              <div class="col-md-3">
                                <a href="{!! url('') !!}/files/Prestaciones/PCP Jubilado.pdf" target="_blank"><button class="boton" style="background: #556B2F;"><img class="img" src="{!! url('') !!}/img_download/PE/formatPresta.png"/><h5 style="font-size: 18px;"><strong>PCP <br>Jubilado</strong></h5></button></a>
                              </div>  
                              <div class="col-md-3">
                                <a href="{!! url('') !!}/files/Prestaciones/Formato de Domiciliacion.pdf" target="_blank"><button class="boton" style="background: #d65cad;"><img class="img" src="{!! url('') !!}/img_download/PE/JubiladoPres.png" /><h4 style="font-size: 18px;"><strong>Formato <br>Domiciliacion</strong></h4></button></a>
                              </div>
                              <div class="col-md-3">
                                <a href="{!! url('') !!}/files/Prestaciones/PMP.pdf" target="_blank"><button class="boton" style="background: #6699ff;"><img class="img"  src="{!! url('') !!}/img_download/PE/prest.png"/><h4 style="font-size: 18px;"><strong>PMP</strong></h4></button></a>
                              </div>        
                            </div>
                          </table>
                          <br> 
                          <!-- ./ PRIMERA LINEA DE FORMATOS DE PERMISOS -->  





                  </div><!-- box-body collapseTwo-->
                </div><!-- ./ collapseTwo-->
              </div> <!-- ./ panel box box-success-->

              <!-- ./ SEGUNDO COLLAPSE DE OBJETIVOS-->


              

            </div><!-- ./ box-group-->


          



          </div><!-- ./ box-body-->
      </div><!-- ./ box box-solid-->

    </div>  <!-- ./ box box-widget widget-user-2-->  
  
    </div> <!-- ./ col-md-10 -->
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
</div> <!-- ./ row -->

@endsection

@section('script')

@endsection
