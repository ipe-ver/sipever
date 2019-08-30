@extends('adminlte::layouts.landing')

@section('style')
	
	{!! Html::style('components/bootstrap/dist/css/bootstrap.css') !!}
@endsection

@section('content')
 <div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<div class="col-md-2">
				<a class="btn btn-block btn-danger btn-sm" href="">
					<span class="fa fa-arrow-circle-left" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Regresar a la bitácora
				</a>
			</div>
			
			<div class="col-md-4">
				<button class="btn btn-success btn-sm" id="btnAgregar">
					<i class="fa fa-plus"></i> Agregar
				</button>
			</div> 			
			<h3 class="box-title pull-right">Listado de Usuarios</h3>
			
		</div>
		<div class="box-body">
			<table class="table" id="table" data-toolbar="#custom-toolbar"></table>
		</div>
	</div>
</div>	

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')

		{!! HTML::script('components/bootstrap-table/dist/bootstrap-table.js') !!}
		{!! HTML::script('components/select2/dist/js/select2.js') !!}	
		{!! HTML::script('components/select2/dist/js/select2.min.js') !!}
		{!! HTML::script('components/inputmask/dist/inputmask/inputmask.js') !!}
		{!! HTML::script('components/inputmask/dist/inputmask/inputmask.date.extensions.js') !!}	
		{!! HTML::script('components/inputmask/dist/inputmask/inputmask.extensions.js') !!}		

		
		<script type="text/javascript">
		$(function (){
			var tituloModal 		= $('#modal-titulo');
			var bodyModal 			= $('.modal-body');
			var footerModal 		= $('.modal-footer');
			var modal 				= $('#modal');
			


			var limpiarModal = function(){
				tituloModal.empty()
				bodyModal.empty()
				footerModal.empty()
			}

			$('#btnAgregar').click(function(){
				limpiarModal();
				tituloModal.append('<i class="fa fa-plus"></i> Agregar usuario');

				campos1 = estilo_modal.mostrar([
					
					{campo:'input',idCampo:'name',nameCampo:'Nombre de usuario:',typeCampo:'text',valorCampo:'',placeholder:'',newClass:'',divSize:'12',datos:''},
					{campo:'input',idCampo:'email',nameCampo:'Correo electronico:',typeCampo:'text',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: ''},
					{campo:'input',idCampo:'password',nameCampo:'Password:',typeCampo:'password',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: ''},
									
					]);

				bodyModal.append(campos1);

				footerModal.append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
				footerModal.append(imprimirBoton('btn-danger', 'btn-cancelar', 'Cancelar'));
				modal.modal('show');
				
			})

			



			footerModal.on('click', '#btnGuardar', function(){
				footerModal.empty();
				footerModal.append(imprimirBoton('btn-success', 'btnGuardar', '<i class="fa fa-spinner fa-spin"></i> Procesando orden', 'disabled'));

				var dataString = {
					name: $("#name").val(),	
					email: $("#email").val(),
					password: $("#password").val(),	
				}
				//console.log(dataString);				
				$.ajax({
					type: 'POST',
					url: routeBase+'/registro',
					data: dataString,
					dataType: 'json',
					success: function(data) {						
						console.log(data);
						if (data.estatus) {
							modal.modal('hide');
							messageToastr(data.tipo, data.mensaje);
							table.bootstrapTable('refresh');							
							
						} else {
							messageToastr(data.tipo, data.mensaje);							
						}														
					},
					error: function(data) {
						var errors = data.responseJSON;						
						$('.modal-body div.has-error').removeClass('has-error');
						$('.help-block').empty();
						$.each(errors.errors, function(key, value){
							$('#div_'+key).addClass('has-error');
							$('input#'+key).addClass('form-control-danger');
							$('#error_'+key).append(value);						
						});
						footerModal.empty();
						footerModal.append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
					}
				});
			})

			

			footerModal.on('click', '#btnEditStatus', function(){
				console.log('Entro');
				dataString = {
					id_usuario: $('#id_usuario').val(),
					estatus: $('#estatus').val()
				}

				$.ajax({
					type: 'POST',
					url: routeBase+'/registro',
					data: dataString,
					dataType: 'json',
					success: function(data) {
						modal.modal('hide');
						messageToastr('success', data.menssage);
						table.bootstrapTable('refresh');		
					},
					error: function(data) {
						var errors = data.responseJSON;						
						$('.modal-body div.has-error').removeClass('has-error');
						$('.help-block').empty();
						$.each(errors.errors, function(key, value){
							$('#div_'+key).addClass('has-error');
							$('input#'+key).addClass('form-control-danger');
							$('#error_'+key).append(value);						
						});
						footerModal.empty();
						footerModal.append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
					}
				});				
				console.log(dataString);
			})

			table.bootstrapTable({
				locale: 'es-MX',
				pagination: true,
				pageList: [5, 10, 25, 50],
				pageSize: 10,
				search: true,				
				url: routeBase+'/consultar/usuarios',
				columns: [{					
					field: 'name',
					title: 'Nick',					
				}, {					
					field: 'email',
					title: 'Correo electrónico',
				}, {
					field: 'nombre_completo',
					title: 'Propietario de la cuenta',
				},{
					field: 'tipo_persona',
					title: 'Tipo personal',
				}, {					
					title: 'Estatus',
					formatter: formatTableStatus,
					events: operateEvents
				}, {					
					title: 'Acciones',
					//formatter: formatTableActions,
					//events: operateEvents
				}]				
			})
			
		});
	</script>
@endsection

