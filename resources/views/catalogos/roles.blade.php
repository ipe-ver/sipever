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
                    <button class="btn btn-primary btn-sm" >
                            <i class="fa fa-plus"></i> Agregar
                    </button> 
                </div>   
            </div>
			 
			 			
			<h3 class="box-title pull-right">Catálogos de Roles</h3>

		</div>
		<div class="box-body">
            <table class="table" id="table"></table> 
 		</div>
 	</div>
</div>


@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')

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
					field: 'name',
					title: 'Name',
					filterControl: 'input',	
					//sortable: true,
				}, {					
					field: 'username',
					title: 'Username',
					filterControl: 'input',	
				},	{					
					field: 'email',
					title: 'E-mail',
					filterControl: 'input',	
				}, {
					field: 'empleados.nombrecompleto',
					title: 'Empleado',	
					filterControl: 'input',				
					
				},  {
					title: 'Acciones',
					//formatter: formatTableActions,
					//events: operateEvents
				}]				
			})	// FIN DE LA TABLA 

			
		

		});// FIN DE LA FUNCION JAVASCRIPT

	</script>



	

	
@endsection
