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
                    <button class="btn btn-primary btn-sm" id="btnAgregar" >
                            <i class="fa fa-plus"></i> Agregar
                    </button> 

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

				tituloModal.append('<i class="fa fa-plus"></i> Agregar Usuario');

				var dataCampos = [
					{campo:'input',idCampo:'name',nameCampo:'Name:',typeCampo:'text',valorCampo:'',placeholder:'Name',newClass:'',divSize:'12',datos:''},
					{campo:'input',idCampo:'username',nameCampo:'Username:',typeCampo:'text',valorCampo:'',placeholder:'Username',newClass:'',divSize:'12',datos:''},	
					{campo:'input',idCampo:'email',nameCampo:'E-mail:',typeCampo:'text',valorCampo:'',placeholder:'E-mail',newClass:'',divSize:'12',datos:''},				
				];

				campos = estilo_modal.mostrar(dataCampos);

				bodyModal.append(campos);
				footerModal.append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
				modal.modal('show');
			});	

			footerModal.on('click', '#btnGuardar', function(){
				var dataString = {
					name: $("#name").val(),
					username: $("#username").val(),
					email: $("#email").val(),
				}
				
				/*$.ajax({
					type: 'POST',
					url: routeIndex,
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
				});*/
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
				url: routeBase+'/catalogos/get_users',
				columns: [{					
					field: 'id',
					title: 'ID.',
				},	{					
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

