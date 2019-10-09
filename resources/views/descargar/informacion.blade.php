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
		width: 80px;
  		height: 80px;
	}
    </style>
@endsection

@section('content')
 


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="box box-solid">
        <div class="box-header with-border">
            <h2 style="text-align:right;">DESCARGAR INFORMACIÓN</h2>
            <br>
            <div class="row">

                <!-- DIRECTORIO IPE 2019-->    
                <div class="col-md-3" >
                      <div class="info-box" style="background: #E8DDCB;">
                          <span class="info-box-icon" style="background: #FE4365;"><img class="img" src="{!! url('') !!}/img_download/descargar_informacion/directorio.png"/></span>

                          <div class="info-box-content">
                             <a href="{!! url('') !!}/files/descargar_informacion/directorio_ipe2019.pdf" target="_blank" style="color: #000000;"><h5 style="font-size: 24px;"><strong>Directorio <br>Telefónico</strong></h5></a>
                              
                          </div>
                          
                      </div>
                  </div>
              

                 <!-- TIPOGRAFIA -->
                 <div class="col-md-3" >
                      <div class="info-box" style="background: #E8DDCB;">
                          <span class="info-box-icon" style="background: #3FB8AF;"><img class="img" src="{!! url('') !!}/img_download/descargar_informacion/tipografia.png"/></span>

                          <div class="info-box-content">
                             <a href="{!! url('') !!}/files/descargar_informacion/tipografia_oficial.zip" target="_blank" style="color: #000000;"><h5 style="font-size: 24px;"><strong>Tipografía <br> Original</strong></h5></a>
                              
                          </div>
                          
                      </div>
                  </div>

                  <!-- FORMATO DE CAPACITACION -->  
                  <div class="col-md-3" >
                      <div class="info-box" style="background: #E8DDCB;">
                          <span class="info-box-icon" style="background: #F8CA00;"><img class="img" src="{!! url('') !!}/img_download/descargar_informacion/capacitacion.png"/></span>

                          <div class="info-box-content">
                             <a href="{!! url('') !!}/files/descargar_informacion/formato_capacitacion.doc" target="_blank" style="color: #000000;"><h5 style="font-size: 24px;"><strong>Formato de <br>Capacitación</strong></h5></a>
                              
                          </div>
                          
                      </div>
                  </div>
               


                 


                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box" style="background: #E8DDCB;">
                        <span class="info-box-icon" style="background: #554234;"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
            </div> <!-- FIN DE ROW-->


        </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

       
    

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection

