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
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="box box-widget widget-user-2">
        <!--CABECERA -->
        <div class="widget-user-header bg-yellow">
          <div class="widget-user-image">
            {{ HTML::image('components/admin-lte/dist/img/avatar5.png', 'User Avatar', array('class' => 'img-circle')) }}
          </div>
          <h1 class="widget-user-username">
              DR. ERICK SAMUEL GUTIÉRREZ RENDÓN 
            <code class="pull-right">
              TECNOLOGÍAS DE LA INFORMACIÓN
            </code>
          </h1>
          <h5 class="widget-user-desc">JEFE DE TECNOLOGÍAS DE LA INFORMACIÓN</h5>
        </div><!-- FIN DE widget-user-header bg-yellow -->

       <!--COLLAPSE DE FORMATOS DE PERMISOS -->     
       <div class="box box-solid">
        <div class="box-body">
          <div class="box-group" id="accordion">

            <!-- PRIMER COLLAPSE DE OBJETIVOS-->
            <div class="panel box box-primary">
              <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      Objetivos 
                    </a>
                  </h4>
              </div>
              
              <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="box-body">
                    <p> Proveer y administrar las tecnologías de información y los sistemas de telecomunicaciones necesarios 
                    para que las unidades administrativas desarrollen sus funciones, y para brindar seguridad y confianza en el manejo 
                    de la información, mediante el fortalecimiento de un gobierno digital y abierto que induzca una mayor participación 
                    de los ciudadanos.</p>
                  </div>
              </div>
            </div><!-- FIN DEL COLLAPSE DE OBJETIVOS-->



            <!--SEGUNDO COLLAPSE DE FUNCIONES 
            <div class="panel box box-success">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Funciones
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body">
                  <ul>
                    <li>Proveer los medios programáticos y operativos adecuados, para el alcance de los objetivos y metas institucionales. </li>
                    <li>Coordinar la aplicación de los sistemas informáticos, así como equipamiento correspondiente en todas las unidades administrativas. </li>
                    <li>Proveer de los servicios informáticos y de telecomunicaciones a las diferentes unidades administrativas. </li>
                    <li>Administrar las licencias de software y realizar la distribución de éstas, de acuerdo con su disponibilidad. </li>
                    <li>Dirigir y coordinar los procesos de mantenimiento preventivo, correctivo y actualización a la infraestructura tecnológica y software implementados. </li>
                    <li>Vigilar la operación de las redes y sistemas institucionales de comunicación de datos, texto, video y voz, así como todos aquellos elementos que intervienen directamente en su operación y funcionamiento. </li>
                    <li>Revisar periódicamente el desempeño de los sistemas en operación y bases de datos. </li>
                    <li>Revisar periódicamente el desempeño de los sistemas en operación y bases de datos. </li> 
                    <li>Proponer a la Dirección General, los lineamientos de actualización tecnológica de los bienes informáticos y de telecomunicaciones. </li> 
                    <li>Elaborar la planeación estratégica en materia de tecnologías de la información y comunicación.</li> 
                    <li>Realizar el seguimiento y evaluación de los rendimientos en materia de tecnologías de la información y comunicaciones.</li> 
                  </ul>
                </div>
              </div>
            </div> -->

              <!--TERCERO COLLAPSE DE FUNCIONES -->
              <div class="panel box box-danger">

                <!-- Inicio de box header with-border -->
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      Oficinas
                    </a>
                  </h4>
                </div>
                <!-- Fin de box header with-border -->

              <div id="collapseThree" class="panel-collapse collapse">
                <div class="box-body">

                  <!-- Link para Soporte Técnico -->
                  <div class="col-md-4" >
                      <div class="info-box" style="background: #E8DDCB;">
                          <span class="info-box-icon" style="background: #413E4A;"><img class="img" src="{!! url('') !!}/img_download/TI/soporte_tecnico.png"/></span>

                          <div class="info-box-content">
                             <a href="{!! url('') !!}/files/TI/permisos/ACTIVO_FIJO.pdf" target="_blank"><h5 style="font-size: 18px;"><strong>Infraestructura y <br>Asistencia Técnia</strong></h5></a>
                              
                          </div>
                          
                      </div>
                  </div>



                  <!-- Link para Gobierno Electronico -->
                  <div class="col-md-4">
                    <div class="info-box" style="background: #E8DDCB;">
                        <span class="info-box-icon" style="background: #B38184;"><img class="img" src="{!! url('') !!}/img_download/TI/gobierno_electronico.png"/></span>

                        <div class="info-box-content">
                          <a href="{!! url('') !!}/files/TI/permisos/ACTIVO_FIJO.pdf" target="_blank"><h5 style="font-size: 18px;"><strong>Gobierno Electrónico y <br>Desarrollo de Aplicaciones</strong></h5></a>
                        </div>
                    </div>
                  </div>

              </div><!-- box body -->


            </div> <!-- panel box box-success -->







          </div><!-- box-group -->
        </div> <!-- box-body -->
      </div> <!-- box box-solid-->  
    </div>
    <div class="col-md-1"></div>
</div>
       
    

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection

