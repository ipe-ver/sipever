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
        

       <!--COLLAPSE DE FORMATOS DE PERMISOS -->     
       <div class="box box-solid">
        <div class="box-body">
        <div class="nav-tabs-custom">
            <h4 style="text-align:right"><strong>OFICINA DE GOBIERNO ELECTRÓNICO Y DESARROLLO DE APLICACIONES</strong></h4>
            <br>
           
            

            <div class="callout callout" style="background: #FFBE40;">
                <h4>Objetivo:</h4>

                <p style="font-size: 20px;">Desarrollar e implementar los sistemas de información que requiere la Institución para automatizar sus procesos, además actualizar y mantener en buen funcionamiento aquellos que están en producción.</p>
            </div>

            <h3><strong>Descargar Formatos</strong></h3>
           <br>

                    <!--CABECERA DEL NAV TAB -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab"><strong>PERMISOS</strong></a></li>
                      <li><a href="#tab_2" data-toggle="tab"><strong>REQUERIMIENTOS</strong></a></li>
                    </ul>

                    <div class="tab-content">
                      <!-- PRIMER TAB-->
                      <div class="tab-pane active" id="tab_1">

                        <!-- PRIMERA LINEA DE FORMATOS DE PERMISOS -->  
                        <table class="table table-bordered">
                          <div class="timeline-body">   
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/ACTIVO_FIJO.pdf" target="_blank"><button class="boton" style="background: #F08080;"><img class="img" src="{!! url('') !!}/img_download/TI/activo_fijo.png"/><h5 style="font-size: 18px;"><strong>Activo <br>Fijo</strong></h5></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/ACTIVOS.pdf" target="_blank"><button class="boton" style="background: #556B2F;"><img class="img" src="{!! url('') !!}/img_download/TI/activos.png"/><h5 style="font-size: 18px;"><strong>Activos</strong></h5></button></a>
                            </div>  
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/ALMACEN.pdf" target="_blank"><button class="boton" style="background: #33CCCC;"><img class="img" src="{!! url('') !!}/img_download/TI/almacen.png" /><h4 style="font-size: 18px;"><strong>Almacén</strong></h4></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/ASUNTOS_JURIDICOS.pdf" target="_blank"><button class="boton" style="background: #FF9900;"><img class="img"  src="{!! url('') !!}/img_download/TI/juridico.png"/><h4 style="font-size: 18px;"><strong>Asuntos<br>Jurídicos</strong></h4></button></a>
                            </div>        
                          </div><!-- FIN DEL timeline-body -->
                        </table>
                        <br> 

                        <!-- SEGUNDA LINEA DE FORMATOS DE PERMISOS -->  
                        <table class="table table-bordered">
                          <div class="timeline-body">
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/AUXILIARES_91.pdf" target="_blank"><button class="boton" style="background: #CC66CC;"><img class="img"  src="{!! url('') !!}/img_download/TI/auxiliares.png"/><h5 style="font-size: 18px;"><strong>Auxiliares<br>91´S</strong></h5></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/CONTABILIDAD.pdf" target="_blank"><button class="boton" style="background: #D2691E;"><img class="img"  src="{!! url('') !!}/img_download/TI/contabilidad.png"/><h5 style="font-size: 18px;"><strong>Contabilidad</strong></h5></button></a>
                            </div>   
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/CONTROL_ADEUDOS.pdf" target="_blank"><button class="boton" style="background: #663399;"><img class="img"  src="{!! url('') !!}/img_download/TI/control.png"/><h4 style="font-size: 18px;"><strong>Control de<br>Adeudos</strong></h4></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/EGRESOS.pdf" target="_blank"><button class="boton" style="background: #9ACD32;"><img class="img"  src="{!! url('') !!}/img_download/TI/nomina_ipe.png"/><h4 style="font-size: 18px;"><strong>Egresos</strong></h4></button></a>
                            </div>      
                          </div><!-- FIN DEL timeline-body -->
                        </table>
                        <br>   

                        <!-- TERCERA LINEA DE FORMATOS DE PERMISOS -->  
                        <table class="table table-bordered">
                          <div class="timeline-body"> 
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/NOM_PENSIONADOS.pdf" target="_blank"><button class="boton" style="background: #FF6347;"><img class="img"  src="{!! url('') !!}/img_download/TI/nomina.png"/><h5 style="font-size: 18px;"><strong>Nómina <br>Pensionados</strong></h5></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/NOMINA.pdf" target="_blank"><button class="boton" style="background: #008080;"><img class="img"  src="{!! url('') !!}/img_download/TI/egresos.png"/><h5 style="font-size: 18px;"><strong>Nómina<br>IPE</strong></h5></button></a>
                            </div>   
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/NOMINA.pdf" target="_blank"><button class="boton" style="background: #191970;"><img class="img" src="{!! url('') !!}/img_download/TI/prestamos.png"/><h4 style="font-size: 18px;"><strong>Prestámos</strong></h4></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/PRESUPUESTOS.pdf" target="_blank"><button class="boton" style="background: #696969;"><img class="img" src="{!! url('') !!}/img_download/TI/presupuestos.png"/><h4 style="font-size: 18px;"><strong>Presupuestos</strong></h4></button></a>
                            </div>       
                          </div><!-- FIN DEL timeline-body -->
                        </table>
                        <br>

                        <!-- CUARTA LINEA DE FORMATOS DE PERMISOS -->  
                        <table class="table table-bordered">
                          <div class="timeline-body"> 
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/REVISTA_BENEFICIARIOS.pdf" target="_blank"><button class="boton" style="background: #000000;"><img class="img" src="{!! url('') !!}/img_download/TI/rev_beneficiarios.png"/><h5 style="font-size: 18px;"><strong>Revista de <br>Beneficiarios</strong></h5></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/REVISTA_SUPERVIVENCIA.pdf" target="_blank"><button class="boton" style="background: #DC143C;"><img class="img" src="{!! url('') !!}/img_download/TI/rev_supervivencia.png"/><h5 style="font-size: 18px;"><strong>Revista<br>Superviviencia</strong></h5></button></a>
                            </div>   
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/REVISTA_INCAPACITADOS.pdf" target="_blank"><button class="boton" style="background: #FF1493;"><img class="img" src="{!! url('') !!}/img_download/TI/rev_incapacitados.png"/><h4 style="font-size: 18px;"><strong>Revista<br>Incapacitados</strong></h4></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/SOPORTE_TECNICO.pdf" target="_blank"><button class="boton" style="background: #7CFC00;"><img class="img"  src="{!! url('') !!}/img_download/TI/soporte.png"/><h4 style="font-size: 18px;"><strong>Soporte<br>Técnico</strong></h4></button></a>
                            </div>              
                          </div><!-- FIN DEL timeline-body -->
                        </table>
                        <br>

                          <!-- CUARTA LINEA DE FORMATOS DE PERMISOS -->  

                        <table class="table table-bordered">
                          <div class="timeline-body">  
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/SUELDO_BASE.pdf" target="_blank"><button class="boton" style="background: #800000;"><img class="img"  src="{!! url('') !!}/img_download/TI/sueldo.png"/><h5 style="font-size: 18px;"><strong>Sueldo <br>Base</strong></h5></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/permisos/TRAMITE_BENEFICIOS.pdf" target="_blank"><button class="boton" style="background: #FF9900"><img class="img"  src="{!! url('') !!}/img_download/TI/beneficios.png"/><h5 style="font-size: 18px;"><strong>Trámite de<br>Beneficios</strong></h5></button></a>
                            </div>     
                          </div><!-- FIN DEL timeline-body -->
                        </table>    
                      </div> <!-- FIN DEL PRIMER TAB-->
                
                      <div class="tab-pane" id="tab_2">
                        <table class="table table-bordered">
                          <div class="timeline-body">             
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/requerimientos/SISTEMAS_2019.doc" target="_blank"><button class="boton" style="background: #9933CC;"><img class="img" src="{!! url('') !!}/img_download/TI/sistemas.png"/><h5 style="font-size: 18px;"><strong>SISTEMAS<br>2019</strong></h5></button></a>
                            </div>
                            <div class="col-md-3">
                              <a href="{!! url('') !!}/files/TI/requerimientos/SISTEMAS_WEB_2019.doc" target="_blank"><button class="boton" style="background: #339999;"><img class="img" src="{!! url('') !!}/img_download/TI/sistemas_web.png"/><h5 style="font-size: 18px;"><strong>WEB 2019</strong></h5></button></a>
                            </div>
                          </div><!-- FIN DEL timeline-body -->
                        </table>
                      </div><!-- FIN DEL SEGUNDO TAB-->
                     </div><!--tab-content -->
                  </div><!-- nav-tabs-custom -->
         



        </div> <!-- box-body -->
      </div> <!-- box box-solid-->  
    </div>
    <div class="col-md-1"></div>
</div>
       







@endsection

@section('script')

@endsection



