@extends('adminlte::layouts.landing')

@section('style')
	@include('catalogos.style')
@endsection

@section('content')
<div class="col-md-12">
	<div class="box" id="div_empleado">
		<div class="box-header">	
			<h3 class="box-title pull-right">Agregar nuevo equipo</h3>
		</div>
	<form autocomplete="off">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Datos del equipo</h3>
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
	<!-- InputMask -->	
	{!! HTML::script('components/inputmask/dist/inputmask/inputmask.js') !!}
	{!! HTML::script('components/inputmask/dist/inputmask/inputmask.date.extensions.js') !!}	
	{!! HTML::script('components/inputmask/dist/inputmask/inputmask.extensions.js') !!}	
	{!! HTML::script('components/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}
	{!! HTML::script('components/moment/min/moment.min.js') !!}
	{!! HTML::script('components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}
	{!! HTML::script('components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}	
	<!-- Select2 bootstrap -->
	{!! HTML::script('components/select2/dist/js/select2.min.js') !!}
	

	<script type="text/javascript">
		$(function(){

	/**********************************************************************************************
		DECLARACION DE LAS VARIABLES EQUIPO, CATCLASIFICACIONES Y CATAREAS
	***********************************************************************************************/
        	
            var catRoles		            = @json($catRoles);
           // console.log(catRoles);
        	

        	

	/**********************************************************************************************
		FORMULARIO DE EQUIPO EN JAVASCRIPT
	***********************************************************************************************/

			campos1 = estilo_modal.mostrar([
				{campo:'input',idCampo:'username',nameCampo:'Username:',typeCampo:'text',valorCampo: '', placeholder:'Nombre del equipo',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'email',nameCampo:'E-mail:',typeCampo:'text',valorCampo: '', placeholder:'Estado situacional',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'select',idCampo:'name',nameCampo:'Name:',typeCampo:'text',valorCampo: '', placeholder:'',newClass:'',divSize:'4',datos: catRoles},	
				
			]);

			

	
	
	

			$('#datos_equipo').append(campos1);
		

			$('#name').selectpicker();

	/**********************************************************************************************
		BOTONES DE GUARDAR Y CANCELAR EN EL FORMULARIO DE EQUIPO
	***********************************************************************************************/

			
				$('#datos_buttom').append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
				$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
				
			


	
	/**********************************************************************************************
		FUNCION PARA EL BOTON DE GUARDAR DEL FORMULARIO DE EQUIPO
	***********************************************************************************************/
			
	//INICIO DE LA FUNCIÓN JAVASCRIPT DEL BOTON DE GUARDAR  DATOS DEL EQUIPO

			$('#datos_buttom').on('click', '#btnGuardar', function(){
				//$('#btnGuardarNotacredito').attr("disabled", true);
				

				var dataString = {
					username: $("#username").val(),	
					email: $("#email").val(),	
					name:  $("#name option:selected").val(),
					
				}

					/*$.ajax({
					type: 'POST',
					url: routeBase+'/recursos_fisicos/equipos',
					data: formData,
					processData: false,
					contentType: false,
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
						$('#datos_buttom').append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
						$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
					}
				});*/

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
				//window.location.replace(routeBase+'/recursos_fisicos/equipos');	

				})	

		}); // FIN DE LA FUNCION JAVASCRIPT
		

	</script>
@endsection