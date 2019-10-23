@extends('adminlte::layouts.landing')

@section('style')
    {!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}
	
@endsection

@section('content')
<div class="col-md-12">

	<div class="box">
		<div class="box-header">
            <div class="pull-left">
                <div class="col-md-2">
                     
					<a href="{!! url('catalogos/add_user') !!}"  class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Usuario</a>																											

                </div>   
            </div>
			 
			 			
			<h3 class="box-title pull-right">Catálogos de Usuario</h3>

		</div>
		<div class="box-body">
            <table class="table" id="table"></table> 
 		</div>
 	</div>
</div>


@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')

	{!! HTML::script('components/select2/dist/js/select2.js') !!}	
	{!! HTML::script('components/select2/dist/js/select2.min.js') !!}

<script type="text/javascript">
		
		$(function (){			
			

			
			var table = $('#table');
			
			
				
			table.bootstrapTable({
				locale: 'es-MX',
				pagination: true,
				exportTypes: ['txt', 'excel', 'doc', 'pdf', 'powerpoint'],
				filterControl:true,
				pageList: [5, 10, 25, 50],
				pageSize: 10,
				search: true,
				searchable: true, 
				smartDisplay: true,
				showColumns: true,
				showExport: true,
				showRefresh: true,
				showFooter:false,
				searchFormatter: true,
				//refreshOptions: true,
				//rowStyle: rowStyle,
				url: routeBase+'/catalogos/get_users',
				columns: [{					
					field: 'id',
					title: 'ID.',
				},	{					
					field: 'username',
					title: 'Nick',
					filterControl: 'input',	
				},	{					
					field: 'email',
					title: 'Correo Electrónico',
					filterControl: 'input',	
				},  {
					field: 'empleados.no_personal',
					title: 'No. Empleado',	
					filterControl: 'input',				
					
				},  {
					field: 'empleados.nombrecompleto',
					title: 'Nombre del Empleado',	
					filterControl: 'input',				
					
				},  {					
					field: 'name',
					title: 'Rol',
					filterControl: 'input',	
				},	{
					title: 'Acciones',
					//formatter: formatTableActions,
					//events: operateEvents
				}]				
			})	// FIN DE LA TABLA 

			
		});// FIN DE LA FUNCION JAVASCRIPT

	</script>
	
@endsection

