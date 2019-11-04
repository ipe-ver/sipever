@extends('adminlte::layouts.landing')

@section('style')
    {!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}
@endsection

@section('content')
<div class="col-md-12">

	<div class="box">
		<div class="box-header">
           
                <div class="col-md-4">
					<a href="{{ url('/catalogos') }}"  class="btn btn-danger"><span class="fa fa-arrow-circle-left" aria-hidden="true"></span>&nbsp;Regresar</a>
					<a href="{!! url('catalogos/add_rol') !!}"   class="btn btn-primary" id="btnAgregar"><i class="fa fa-plus"></i> Agregar Permiso</a>	
                     
                </div>   
         
			 
			 			
			<h3 class="box-title pull-right">Catálogos de Permisos</h3>

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
			

			var tituloModal = $('#modal-titulo');
			var bodyModal = $('.modal-body');
			var footerModal = $('.modal-footer');
			var modal = $('#modal');
			var table = $('#table');
			

			var limpiarModal = function(){
				tituloModal.empty()
				bodyModal.empty()
				footerModal.empty()
			}

			$('#btnAgregar').click(function(e){
				e.preventDefault();
				limpiarModal();

				tituloModal.append('<i class="fa fa-plus"></i> Agregar Permisos');

				var dataCampos = [
					
					{campo:'input',idCampo:'name',nameCampo:'Descripción del permiso:',typeCampo:'text',valorCampo:'',placeholder:'Descripción del permiso',newClass:'',divSize:'12',datos:''},	
					
					
				];

				campos = estilo_modal.mostrar(dataCampos);

				bodyModal.append(campos);
				footerModal.append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
				footerModal.append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
				modal.modal('show');
			});	

			footerModal.on('click', '#btnGuardar', function(){
				$guard_name = 'web';
				var dataString = {
					name: $("#name").val(),
					guard_name: $guard_name,
				}
				console.log(dataString);
				
				$.ajax({
					type: 'POST',
					url: routeBase+'/catalogos/add_permisos',
					data: dataString,
					dataType: 'json',
					success: function(data) {						
						if (data.estatus) {
							modal.modal('hide');
							messageToastr(data.tipo, data.mensaje);
							table.bootstrapTable('refresh');
						} else {
							messageToastr(data.tipo, data.mensaje);
							validarDatos(data.errors);
						}						
														
					},
					error: function(data) {
						console.log(data);
					}
				});
			})

			footerModal.on('click', '#btnCancelar', function(){
				window.location.replace(routeBase+'/catalogos/permisos');	
			})

						
				
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
				url: routeBase+'/catalogos/get_permisos',
				columns: [{					
					field: 'id',
					title: 'ID.',
				},	{					
					field: 'name',
					title: 'Name',
					filterControl: 'input',	
				},	{					
					field: 'guard_name',
					title: 'Tipo',
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


