@extends('adminlte::layouts.landing')

@section('style')
	@include('catalogos.style')
@endsection

@section('content')
<div class="col-md-12">
	<div class="box" id="div_empleado">
		<div class="box-header">	
			<h3 class="box-title pull-right">Agregar nuevo Rol</h3>
		</div>
	<form autocomplete="off">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Datos del rol</h3>
			</div>
			<div class="box-body" id="datos_equipo">

			</div>
		</div>

		
		<div id="datos_buttom">
			
		</div>
		
	</form>

	
	</div>
</div>

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')
<style type="text/css">
		#datos_buttom{
			text-align: right;
		}
	</style>
	<!-- Select2 bootstrap -->
	
	{!! HTML::script('components/select2/dist/js/select2.js') !!}	
	{!! HTML::script('components/select2/dist/js/select2.min.js') !!}

	

	<script type="text/javascript">
		$(function(){

	/**********************************************************************************************
		DECLARACION DE LAS VARIABLES EQUIPO, CATCLASIFICACIONES Y CATAREAS
	***********************************************************************************************/
        	
            		           
			var catPermisos		                = @json($catPermisos);

		 

	/**********************************************************************************************
		FORMULARIO DE EQUIPO EN JAVASCRIPT
	***********************************************************************************************/

			campos1 = estilo_modal.mostrar([
				{campo:'input', idCampo:'name', nameCampo:'Nombre:', typeCampo:'text', valorCampo: '', placeholder:'Nombre del rol', newClass:'', divSize:'12',datos:''},
				{campo:'input', idCampo:'description', nameCampo:'Descripción:', typeCampo:'text', valorCampo: '', placeholder:'Descripción del rol', newClass:'', divSize:'12', datos:''},
				{campo:'select',idCampo:'id_permisos',nameCampo:'Permisos:',typeCampo:'text',valorCampo: '',placeholder:'',newClass:'',divSize:'12',datos: catPermisos, defaultOption:false, extras:'multiple'},
				
			]);


			$('#datos_equipo').append(campos1);
		
			
			$('#id_permisos').selectpicker();

           

	/**********************************************************************************************
		BOTONES DE GUARDAR Y CANCELAR EN EL FORMULARIO DE EQUIPO
	***********************************************************************************************/

				espacio = document.createTextNode(' ');	
				$('#datos_buttom').append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
				$('#datos_buttom').append(espacio);	
				$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
				
			


	
	/**********************************************************************************************
		FUNCION PARA EL BOTON DE GUARDAR DEL FORMULARIO DE EQUIPO
	***********************************************************************************************/
			
	//INICIO DE LA FUNCIÓN JAVASCRIPT DEL BOTON DE GUARDAR  DATOS DEL EQUIPO

			$('#datos_buttom').on('click', '#btnGuardar', function(){
				//$('#btnGuardarNotacredito').attr("disabled", true);
				
                $guard_name = 'web';
				var dataString = {
					name: $("#name").val(),	
					description: $("#description").val(),	
					id_permisos:  $("#id_permisos option:selected").val(),
                    id_permisos:  $('#id_permisos').val(),
                    guard_name: $guard_name,
				}
				console.log(dataString);

					$.ajax({
					type: 'POST',
					url: routeBase+'/catalogos/save_rol',
					data: dataString,
					//processData: false,
					//contentType: false,
					dataType: 'json',
					success: function(data) {									
							messageToastr('success', data.message);	
							window.location.replace(routeBase+'/catalogos/roles');																
					},
					error: function(data) {
						//console.log(data);
						var errors = data.responseJSON;						
						$('.box-body div.has-error').removeClass('has-error');
						$('.help-block').empty();
						$.each(errors.errors, function(key, value){	

							$('#div_'+key).addClass('has-error');
							$('input#'+key).addClass('form-control-danger');
							$('#error_'+key).append(value);						
						});
						messageToastr('error', errors.message);
						$('#datos_buttom').empty();
						$('#datos_buttom').append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
						$('#datos_buttom').append(espacio);	
						$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
					}
				});

			})	


			

	


	/**********************************************************************************************
		FUNCION PARA EL BOTON DE EDITAR DEL FORMULARIO DE EQUIPO
	***********************************************************************************************/

			$('#datos_buttom').on('click', '#btnEditar', function(){
				//$('#btnGuardarNotacredito').attr("disabled", true);


				var dataString = {
					username: $("#username").val(),	
					email: $("#email").val(),	
					name:  $("#name option:selected").val(),
				}

					

					/*$.ajax({
					type: 'PUT',
					url: routeBase+'/recursos_fisicos/equipos/update/'+equipo.id,
					data: dataString,
					dataType: 'json',
					success: function(data) {										
							messageToastr('success', data.message);						
							window.location.replace(routeBase+'/recursos_fisicos/equipos');							
					},
					error: function(data) {
						var errors = data.responseJSON;						
						$('.box-body div.has-error').removeClass('has-error');
						$('.help-block').empty();
						$.each(errors.errors, function(key, value){	

							$('#div_'+key).addClass('has-error');
							$('input#'+key).addClass('form-control-danger');
							$('#error_'+key).append(value);						
						});
						messageToastr('error', errors.message);
						$('#datos_buttom').empty();
						$('#datos_buttom').append(imprimirBoton('btn-success', 'btnEditar', 'Editar'));
						$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
					}
				});*/


			})	

	
	/**********************************************************************************************
		FUNCION PARA REDIRECCIONAR EL BOTON DE CANCELAR A LA PAGINA DE INDEX
	***********************************************************************************************/

			$('#datos_buttom').on('click', '#btnCancelar', function(){
				window.location.replace(routeBase+'/catalogos/roles');	

				})	

		}); // FIN DE LA FUNCION JAVASCRIPT
		

	</script>
@endsection


