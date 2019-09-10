@extends('adminlte::layouts.landing')

@section('style')
	@include('expediente.style')
@endsection

@section('content')
<div class="col-md-12">
	<div class="box" id="div_actpen">
		<div class="box-header">	
			<h3 class="box-title pull-right">Agregar nuevo Activo o Pensionado</h3>
		</div>
	<form autocomplete="off">
        <div class="row">
          	<div class="col-md-12">
            	<div class="card">
              		<div class="card-header"></div>
              		<div class="card-body">
                		<div id="accordion">
		                	<!--  PRIMER FORMULARIO DATOS PERSONALES -->
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Datos Personales</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					                         	<i class="fa fa-plus"></i>
					                 		</button>
					                 	</div>
								</div>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
		                      <div class="card-body">
		                      	<div class="box-body" id="datos_personales"></div>
		                      </div>
		                    </div> 
		                    <!--  SEGUNDO FORMULARIO DATOS DOMICILIO -->
		                    <div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Datos del Domicilio</h3>
										<div class="box-tools pull-right">
											
											<button type="button" class="btn btn-box-tool" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
					                         	<i class="fa fa-plus"></i>
					                 		</button>
					                 	</div>
								</div>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
		                      <div class="card-body">
		                      	<div class="box-body" id="datos_domicilio"></div>
		                      </div>
				                    </div> 
		                    <!--  TERCERO FORMULARIO DATOS LABORAL -->
		                    <div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Datos Profesionales</h3>
										<div class="box-tools pull-right">
											
											<button type="button" class="btn btn-box-tool" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
					                         	<i class="fa fa-plus"></i>
					                 		</button>
					                 	</div>
								</div>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
		                      <div class="card-body">
		                      	<div class="box-body" id="datos_profesionales"></div>
		                      </div>
		                    </div> 
		                    <!--  CUARTO FORMULARIO DATOS DE LAS PLAZAS 
		                    <div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Datos de Plazas</h3>
										<div class="box-tools pull-right">
											
											<button type="button" class="btn btn-box-tool" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
					                         	<i class="fa fa-plus"></i>
					                 		</button>
					                 	</div>
								</div>
							</div>-->
							<div id="collapseFour" class="panel-collapse collapse">
		                      <div class="card-body">
		                      	<div class="box-body" id="datos_plazas"></div>
		                      </div>
		                    </div> 
						</div>   <!--  accordion --> 
               		</div>  <!--  card-body --> 
				</div>  <!--  card  --> 
         	</div> <!--  col-md-12  -->
        </div> <!--  row  -->
      
        <!--  BOTON DE ACEPTAR O CANCELAR -->
		<div id="datos_buttom"></div>
	</form> <!--  form  -->
	</div> <!--  div_actpen  -->
</div> <!--  col-md-12  -->

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')
	@include('expediente.script')	
@endsection

