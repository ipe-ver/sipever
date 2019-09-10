@extends('adminlte::layouts.landing')

@section('style')
	{!! Html::style('components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
@endsection

@section('content')

<div class="col-md-12">
	<div class="box">
		

		<div class="box-header">
			<div class="col-md-1">
				<a class="btn btn-block btn-danger btn-sm" href="{{ url('expediente/') }} ">
							<span class="fa fa-arrow-circle-left" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Regresar
				</a>			
			</div>
			<br>
			<div class="col-md-12">
				<h3 class="box-title pull-right">Detalle del Activo o Pensionado</h3>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-12">
				<div class="box box-widget widget-user-2">				
					<div class="widget-user-header bg-gray">
							<div class="widget-user-image">						
								{{ HTML::image('components/admin-lte/dist/img/avatar5.png', 'User Avatar', array('class' => 'img-circle')) }}
							</div>
						<!-- /.widget-user-image -->
							<h1 class="widget-user-username">
								{!! $actpen->nombre !!} {!! $actpen->paterno !!} {!! $actpen->materno !!}
								<code class="pull-right">
									Número de Afiliación o Pensionado: 
									<strong>
										{!! $actpen->numero !!}
									</strong>
								</code>
							</h1>
							<h5 class="widget-user-desc">{!! $actpen->actpen !!}</h5>
							<h1 class="widget-user-username">
								<code class="pull-right">
									Fecha de Ingreso:
									<strong>
										{!! $actpen->fecha_ingreso !!}
									</strong>
								</code>
							</h1>	
						<br>	
					</div>
					<br>

					<div class="col-md-12">
						<!-- Custom Tabs -->
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_datos" data-toggle="tab" aria-expanded="true">
									<i class="fa fa-address-book"></i> <span id="menu">Datos Personales</span></a>
								</li>
								<li class=""><a href="#tab_domicilio" data-toggle="tab" aria-expanded="false">
									<i class="fa fa-map-marker-alt"></i> <span id="menu">Datos del Domicilio</span></a>
								</li>
								<li class=""><a href="#tab_laborales" data-toggle="tab" aria-expanded="false">
									<i class="fas fa-id-card-alt"></i><span id="menu"> Datos laborales</span></a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_datos">
									<div class="page-header" >
										<h4>Fecha de Nacimiento:<small class="pull-right">{!! $actpen->fecha_nacimiento  !!}</small></h4>
										<h4>Sexo:<small class="pull-right">{!!  $actpen->sexo !!}</small></h4>
										<h4>Estado civil:<small class="pull-right">{!! $actpen->estadocivil !!}</small></h4>
										<h4>RFC:<small class="pull-right">{!! $actpen->rfc !!}</small></h4>	
										<h4>CURP:<small class="pull-right">{!! $actpen->curp !!}</small></h4>
										<h4>Número de Seguridad Social:<small class="pull-right">{!! $actpen->nss !!}</small></h4>
										<h4>Folio del INE:<small class="pull-right">{!! $actpen->ine !!}</small></h4>
										<h4>Correo Eléctronico:<small class="pull-right">{!! $actpen->correo_electronico_personal !!}</small></h4>
									</div>
								</div>
								<div class="tab-pane" id="tab_domicilio">
									<div class="page-header" >
										<h4>Calle:<small class="pull-right">{!! $actpen->calle !!}</small></h4>
										<h4>No. Exterior:<small class="pull-right">{!! $actpen->no_exterior  !!}</small></h4>
										<h4>No. Interior:<small class="pull-right">{!!  $actpen->no_interior !!}</small></h4>
										<h4>Colonia:<small class="pull-right">{!! $actpen->colonia !!}</small></h4>
										<h4>Código Postal:<small class="pull-right">{!! $actpen->cp !!}</small></h4>
										<h4>Vivienda:<small class="pull-right">{!! $actpen->vivienda !!}</small></h4>		
										<h4>Télefono Fijo:<small class="pull-right">{!! $actpen->telefono_fijo !!}</small></h4>
										<h4>Télefono Celular:<small class="pull-right">{!! $actpen->telefono_celular !!}</small></h4>
									</div>
								</div>
								<div class="tab-pane" id="tab_laborales">
									<div class="page-header">
										<h4>Profesión:<small class="pull-right">{!! $actpen->profesion !!}</small></h4>
										<h4>Institución:<small class="pull-right">{!! $actpen->institucion !!}</small></h4>
									</div>
									<div class="box box-success">
										<div class="box-header with-border">
											<h3 class="box-title"><strong>Observaciones</strong></h3>
										</div>
										<div class="box-body">
											{!! $actpen->comentario !!}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection

@section('script')
	
@endsection