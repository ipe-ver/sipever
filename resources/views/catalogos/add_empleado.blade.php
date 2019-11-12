@extends('adminlte::layouts.landing')

@section('style')
	@include('catalogos.style')
@endsection

@section('content')
<div class="col-md-12">
	<div class="box" id="div_empleado">
		<div class="box-header">	
			<h3 class="box-title pull-right">Agregar nuevo empleado</h3>
		</div>
	<form autocomplete="off">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Datos del empleado</h3>
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
			var empleado								= @if(isset($empleado)) @json($empleado); @else{}; @endif
            		           
			
			//console.log(catRoles);  
		 

	/**********************************************************************************************
		FORMULARIO DE EQUIPO EN JAVASCRIPT
	***********************************************************************************************/

			campos1 = estilo_modal.mostrar([
				{campo:'input', idCampo:'no_personal', nameCampo:'No. de Personal:', typeCampo:'text', valorCampo: (Object.keys(empleado).length)? empleado.no_personal: '', placeholder:'No. de Personal', newClass:'', divSize:'12',datos:''},
				{campo:'input', idCampo:'fecha_ingreso', nameCampo:'Fecha de Ingreso:', typeCampo:'text', valorCampo: (Object.keys(empleado).length)? empleado.fecha_ingreso: '', placeholder:'Fecha de Ingreso', newClass:'', divSize:'12', datos:''},
				{campo:'input',idCampo:'apellido_paterno',nameCampo:'Apellido Paterno:',typeCampo:'text',valorCampo: (Object.keys(empleado).length)? empleado.apellido_paterno: '', placeholder:'Apellido Paterno',newClass:'mayuscula',divSize:'12',datos: ''},
                {campo:'input',idCampo:'apellido_materno',nameCampo:'Apellido Materno:',typeCampo:'text',valorCampo: (Object.keys(empleado).length)? empleado.apellido_materno: '', placeholder:'Apellido Materno',newClass:'mayuscula',divSize:'12',datos: ''},
                {campo:'input',idCampo:'nombre',nameCampo:'Nombre(s):',typeCampo:'text',valorCampo: (Object.keys(empleado).length)? empleado.nombre: '', placeholder:'Nombre(s)',newClass:'mayuscula',divSize:'12',datos: ''},
			]);


			$('#datos_equipo').append(campos1);

            $("input#fecha_ingreso").mask("00/00/0000", {placeholder: "dd/mm/yyyy"});	
		

	/**********************************************************************************************
		BOTONES DE GUARDAR Y CANCELAR EN EL FORMULARIO DE EQUIPO
	***********************************************************************************************/

				

				espacio = document.createTextNode(' ');	
				if(Object.keys(empleado).length){
					$('#datos_buttom').append(imprimirBoton('btn-success', 'btnEditar', 'Editar'));
					$('#datos_buttom').append(espacio);	
					$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
				}else{
					$('#datos_buttom').append(imprimirBoton('btn-success', 'btnGuardar', 'Guardar'));
					$('#datos_buttom').append(espacio);	
					$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
				
				}
				
			


	
	/**********************************************************************************************
		FUNCION PARA EL BOTON DE GUARDAR DEL FORMULARIO DE EQUIPO
	***********************************************************************************************/
			
	//INICIO DE LA FUNCIÓN JAVASCRIPT DEL BOTON DE GUARDAR  DATOS DEL EQUIPO

			$('#datos_buttom').on('click', '#btnGuardar', function(){
				//$('#btnGuardarNotacredito').attr("disabled", true);
				

				var dataString = {
					no_personal: $("#no_personal").val(),	
					fecha_ingreso: $("#fecha_ingreso").val(),	
					apellido_paterno: $("#apellido_paterno").val(),	
					apellido_materno: $("#apellido_materno").val(),	
                    nombre: $("#nombre").val(),	
					
				}
				//console.log(dataString);

					$.ajax({
					type: 'POST',
					url: routeBase+'/catalogos/empleado',
					data: dataString,
					//processData: false,
					//contentType: false,
					dataType: 'json',
					success: function(data) {									
							messageToastr('success', data.message);	
							window.location.replace(routeBase+'/catalogos/empleados');																
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
					no_personal: $("#no_personal").val(),	
					fecha_ingreso: $("#fecha_ingreso").val(),	
					apellido_paterno: $("#apellido_paterno").val(),	
					apellido_materno: $("#apellido_materno").val(),	
                    nombre: $("#nombre").val(),	
					
				}

				//console.log(dataString);	

					$.ajax({
					type: 'PUT',
					url: routeBase+'/catalogos/empleados/update/'+empleado.id,
					data: dataString,
					dataType: 'json',
					success: function(data) {										
							messageToastr('success', data.message);						
							window.location.replace(routeBase+'/catalogos/empleados');							
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
						$('#datos_buttom').append(espacio);	
						$('#datos_buttom').append(imprimirBoton('btn-danger', 'btnCancelar', 'Cancelar'));
					}
				});


			})	

	
	/**********************************************************************************************
		FUNCION PARA REDIRECCIONAR EL BOTON DE CANCELAR A LA PAGINA DE INDEX
	***********************************************************************************************/

			$('#datos_buttom').on('click', '#btnCancelar', function(){
				window.location.replace(routeBase+'/catalogos/empleados');	

				})	

		}); // FIN DE LA FUNCION JAVASCRIPT
		

	</script>
@endsection