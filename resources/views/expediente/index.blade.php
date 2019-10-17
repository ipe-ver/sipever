@extends('adminlte::layouts.landing')

@section('style')
	
	

	
@endsection

@section('content')
<div class="col-md-12">

	<div class="box">
		<div class="box-header">
			<div class="col-md-2">
			
		           
					<a href="{!! url('expediente/add') !!}" id="agregar_expediente" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>	
			 
			</div>	 
			 			
			<h3 class="box-title pull-right">Listado de Personal Activo o Pensionado</h3>

		
		
			
		</div>
		<div class="box-body">
 			<table class="table" id="table" data-toolbar="#custom-toolbar"></table>
 		</div>
 	</div>
</div>

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')

			

	

<script type="text/javascript">

	$(function (){	

		 
		/*****************************************************************************************
				DECLARAR VARIABLES
		*****************************************************************************************/

		
		var table 	  = $('#table');
		var routeIndex = '{!! route('expediente.index') !!}';


		
	
		/**********************************************************************************************
			FUNCION PARA NO MOSTRAR Y REFRESCAR LA TABLA DE INCIDENCIAS CON EL BOTON DE CANCELAR
		***********************************************************************************************/
			


		var formatTable = function(value, row, index) {	
					
				btn = '<button class="btn btn-warning btn-xs view"><i class="fa fa-eye"></i>&nbsp;Detalle</button>';	
					
				btn = btn+'&nbsp;<button class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>&nbsp;Editar</button>';

				btn = btn+'&nbsp;<button class="btn btn-success btn-xs plaza"><i class="fa fa-calendar"></i>&nbsp;Plazas</button>';

				btn = btn+'&nbsp;<button class="btn btn-danger btn-xs pdf"><i class="fa fa-file-pdf"></i>&nbsp;PDF</button>';
				
				return [btn].join('');
			};
		
			window.operateEvents = {
				'click .view': function (e, value, row, index) {					
					location.href = routeIndex+'/'+row.id;	
				},
				'click .edit': function (e, value, row, index) {
					location.href = routeIndex+'/edit/'+row.id;						
				},
				'click .plaza': function (e, value, row, index) {
					location.href = routeIndex+'/'+row.id+'/plaza';						
				},
				'click .pdf': function (e, value, row, index) {					
					//window.open(routeIndex+'/kardex/pdf/'+row.id,'_blank');
				}
			}	

			
			table.bootstrapTable({
				locale: 'es-MX',
				pagination: true,
				exportTypes: ['txt', 'excel', 'doc', 'pdf', 'powerpoint'],
				filterControl: true, 
				pageList: [5, 10, 25, 50],
				pageSize: 500,
				search: true,
				searchable: true, 
				smartDisplay: true,
				showColumns: true,
				showExport: true,
				showRefresh: true,
				showFooter:false,
				searchFormatter: true,
				url: routeBase+'/expediente/get_expediente',
				columns: [{	
						sortable: true,					
						field: 'id',
						title: 'ID.',
					}, {	
						sortable: true,					
						field: 'actpen',
						title: 'Tipo de Personal',
						filterControl: 'input',	
					}, {
						sortable: true,						
						field: 'numero',
						title: 'Número Afiliación',
						filterControl: 'input',	
					}, {
						sortable: true,						
						field: 'paterno',
						title: 'Apellido Paterno',
						filterControl: 'input',	
					}, {
						sortable: true,						
						field: 'materno',
						title: 'Apellido Materno',
						filterControl: 'input',	
					}, {
						sortable: true,					
						field: 'nombre',
						title: 'Nombres',	
						filterControl: 'input',					
					}, {
						sortable: true,						
						field: 'fecha_ingreso',
						title: 'Fecha de Ingreso',
						filterControl: 'input',	
						visible: true,
					},	{					
						title: 'Acciones',
						formatter: formatTable,
						events: operateEvents
					}]				
				})

				
	
		}); // FIN DE LA FUNCION JAVASCRIPT
	</script>	

@endsection

