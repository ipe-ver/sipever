<style type="text/css">
		#datos_buttom{
			text-align: right;
		}
	</style>
	
	
	<!-- Select2 bootstrap -->
	
	{!! HTML::script('components/select2/dist/js/select2.js') !!}	
	{!! HTML::script('components/select2/dist/js/select2.min.js') !!}

	<!-- InputMask -->	

	{!! HTML::script('components/inputmask/dist/inputmask/inputmask.js') !!}
	{!! HTML::script('components/inputmask/dist/inputmask/inputmask.date.extensions.js') !!}	
	{!! HTML::script('components/inputmask/dist/inputmask/inputmask.extensions.js') !!}

	

	<script type="text/javascript">
		$(function(){

	/**********************************************************************************************
		DECLARACION DE LAS VARIABLES 
	***********************************************************************************************/
        var actpen							= @if(isset($actpen)) @json($actpen); @else{}; @endif	
		var catActPen					    = [{valor: 'ACTIVO', descripcion: 'ACTIVO'},{valor: 'PENSIONADO', descripcion: 'PENSIONADO'} ];
		var catSexo						    = [{valor: 'FEMENINO', descripcion: 'FEMENINO'},{valor: 'MASCULINO', descripcion: 'MASCULINO'} ];
        var catEdoCivil	                    = @json($catEdoCivil);	
        var catVivienda	                    = @json($catVivienda);
		var catSituacion                    = @json($catSituacion);
        
        //console.log(catSituacion);
      

	/**********************************************************************************************
		FORMULARIO EN JAVASCRIPT
	***********************************************************************************************/

		campos1 = estilo_modal.mostrar([
				{campo:'select', idCampo:'actpen', nameCampo:'Activo o Pensionado:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.actpen: '', placeholder:'', newClass:'', divSize:'3', datos: catActPen},

				{campo:'input', idCampo:'numero', nameCampo:'Número de Afiliación o Pensionado:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.numero: '', placeholder:'Número de Afiliación o Pensionado', newClass:'mayuscula', divSize:'3', datos:''},

				{campo:'input', idCampo:'fecha_ingreso', nameCampo:'Fecha de Ingreso:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.fecha_ingreso: '', placeholder:'Fecha de Ingreso', newClass:'mayuscula', divSize:'3', datos:''},

				{campo:'input', idCampo:'fecha_ajustada', nameCampo:'Fecha Ajustada:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.fecha_ajustada: '', placeholder:'Fecha Ajustada', newClass:'mayuscula', divSize:'3', datos:''},
					
		]);	

		campos2 = estilo_modal.mostrar([
				
				{campo:'input', idCampo:'fecha_reingreso', nameCampo:'Fecha de Reingreso:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.fecha_reingreso: '', placeholder:'Fecha de Reingreso', newClass:'mayuscula', divSize:'3', datos:''},

				{campo:'input', idCampo:'nss', nameCampo:'Número de Seguridad Social:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.nss: '', placeholder:'Número de Seguridad Social', newClass:'mayuscula', divSize:'3', datos: ''},			

				{campo:'select', idCampo:'id_situacion', nameCampo:'Situación:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.id_situacion: '', placeholder:'', newClass:'', divSize:'3', datos: catSituacion},	
					
		]);	

		campos3 = estilo_modal.mostrar([
				
				{campo:'textarea', idCampo:'notas_titulares', nameCampo:'Notas a Titulares:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.notas_titulares: '', placeholder:'Escribe aquí...', newClass:'mayuscula', divSize:'6', datos:''},

				{campo:'textarea', idCampo:'comentarios_homonimia', nameCampo:'Comentarios Homonimia:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.comentarios_homonimia: '', placeholder:'Escribe aquí...', newClass:'mayuscula', divSize:'6', datos:''},
					
		]);	


		campos4 = estilo_modal.mostrar([
				{campo:'input', idCampo:'paterno', nameCampo:'Apellido Paterno:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.paterno: '', placeholder:'Apellido Paterno',newClass:'mayuscula', divSize:'3', datos:''},

				{campo:'input', idCampo:'materno', nameCampo:'Apellido Materno:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.materno: '', placeholder:'Apellido Materno',newClass:'mayuscula', divSize:'3', datos:''},

				{campo:'input', idCampo:'nombre', nameCampo:'Nombres:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.nombre: '', placeholder:'Nombres', newClass:'mayuscula',divSize:'3', datos:''},

				{campo:'input', idCampo:'fecha_nacimiento', nameCampo:'Fecha de Nacimiento:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.fecha_nacimiento: '', placeholder:'Fecha de Nacimiento', newClass:'mayuscula', divSize:'3', datos: ''},
					
		]);	

		campos5 = estilo_modal.mostrar([
				

				{campo:'select', idCampo:'sexo', nameCampo:'Sexo:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.sexo: '', placeholder:'', newClass:'', divSize:'3', datos: catSexo},

				{campo:'select', idCampo:'id_estadocivil', nameCampo:'Edo. Civil:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.id_estadocivil: '', placeholder:'', newClass:'', divSize:'3', datos: catEdoCivil},	

				{campo:'input', idCampo:'rfc', nameCampo:'RFC:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.rfc: '', placeholder:'RFC', newClass:'mayuscula', divSize:'3', datos:''},

				{campo:'input', idCampo:'curp', nameCampo:'CURP:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.curp: '', placeholder:'CURP', newClass:'mayuscula', divSize:'3', datos:''},
					
		]);	

				
		campos6 = estilo_modal.mostrar([

				{campo:'input', idCampo:'ine', nameCampo:'Folio del INE:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.ine: '', placeholder:'Folio del INE', newClass:'mayuscula', divSize:'3', datos: ''},

				{campo:'input', idCampo:'correo_electronico_personal', nameCampo:'Correo Eléctronico:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.correo_electronico_personal: '', placeholder:'Correo Eléctronico', newClass:'mayuscula', divSize:'3', datos: ''},	

		]);	



		campos7 = estilo_modal.mostrar([

				{campo:'textarea', idCampo:'comentario', nameCampo:'Observaciones:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.comentario: '', placeholder:'Escribe aquí...', newClass:'mayuscula', divSize:'12', datos:''},
								
		]);

		campos8 = estilo_modal.mostrar([
				{campo:'input', idCampo:'calle', nameCampo:'Calle:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.calle: '', placeholder:'Calle', newClass:'mayuscula', divSize:'4', datos: ''},

				{campo:'input', idCampo:'no_exterior', nameCampo:'No. Exterior:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.no_exterior: '', placeholder:'No. Exterior', newClass:'mayuscula', divSize:'4', datos: ''},

				{campo:'input', idCampo:'no_interior', nameCampo:'No. Interior:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.no_interior: '', placeholder:'No. Interior', newClass:'mayuscula', divSize:'4', datos: ''},

		]);	

		campos9 = estilo_modal.mostrar([

				{campo:'input', idCampo:'colonia', nameCampo:'Colonia:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.colonia: '', placeholder:'Colonia', newClass:'mayuscula', divSize:'4', datos: ''},
				
				{campo:'input', idCampo:'cp', nameCampo:'Código Postal:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.cp: '', placeholder:'Código Postal', newClass:'mayuscula', divSize:'4', datos: ''},

				{campo:'select', idCampo:'id_vivienda', nameCampo:'Vivienda:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.id_vivienda: '', placeholder:'', newClass:'', divSize:'4', datos: catVivienda},	
				
				
		]);	

		campos10 = estilo_modal.mostrar([
				{campo:'input', idCampo:'telefono_fijo', nameCampo:'Télefono Fijo:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.telefono_fijo: '', placeholder:'Télefono Fijo', newClass:'mayuscula', divSize:'4', datos: ''},

				{campo:'input', idCampo:'telefono_celular', nameCampo:'Télefono Celular:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.telefono_celular: '', placeholder:'', newClass:'mayuscula', divSize:'4', datos: ''},
		
		]);	

		campos11 = estilo_modal.mostrar([

				{campo:'input', idCampo:'profesion', nameCampo:'Profesión:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.profesion: '', placeholder:'Profesión', newClass:'mayuscula', divSize:'6', datos: ''},
				{campo:'input', idCampo:'institucion', nameCampo:'Institución:', typeCampo:'text', valorCampo: (Object.keys(actpen).length)? actpen.institucion: '', placeholder:'Institución', newClass:'mayuscula', divSize:'4', datos: ''},
		
		]);	

		// DATOS GENERALES	
		$('#datos_generales').append(campos1);
		$('#datos_generales').append(campos2);
		$('#datos_generales').append(campos3);

		// DATOS PERSONALES	
		$('#datos_personales').append(campos4);
		$('#datos_personales').append(campos5);
		$('#datos_personales').append(campos6);
		$('#datos_personales').append(campos7);
		

		// DATOS DOMICILIO
		$('#datos_domicilio').append(campos8);
		$('#datos_domicilio').append(campos9);
		$('#datos_domicilio').append(campos10);

		// DATOS PROFESIONALES	
		$('#datos_profesionales').append(campos11);

		

		

		$('#actpen').selectpicker();
		$('#sexo').selectpicker();
		$('#id_estadocivil').selectpicker();
		$('#id_vivienda').selectpicker();
		$('#id_situacion').selectpicker();
		

		$("input#fecha_ingreso").mask("00/00/0000", {placeholder: "dd/mm/yyyy"});	
		$("input#fecha_ajustada").mask("00/00/0000", {placeholder: "dd/mm/yyyy"});	
		$("input#fecha_reingreso").mask("00/00/0000", {placeholder: "dd/mm/yyyy"});	
		$("input#fecha_nacimiento").mask("00/00/0000", {placeholder: "dd/mm/yyyy"});
		$("input#telefono_fijo").mask("(999) 999-9999", {placeholder: "(999) 999-9999"});
		$("input#telefono_celular").mask("(999) 999-9999", {placeholder: "(999) 999-9999"});


		
	

	/**********************************************************************************************
		BOTONES DE GUARDAR Y CANCELAR EN EL FORMULARIO 
	***********************************************************************************************/
	

		espacio = document.createTextNode(' ');		
		if(Object.keys(actpen).length){
				$('#datos_buttom').append(imprimirBoton('btn-success btn-flat', 'btnEditar', 'Editar'));
				$('#datos_buttom').append(espacio);	
				$('#datos_buttom').append(imprimirBoton('btn-danger btn-flat', 'btnCancelar', 'Cancelar'));
			}else{
				$('#datos_buttom').append(imprimirBoton('btn-success btn-flat', 'btnGuardar', 'Guardar'));
				$('#datos_buttom').append(espacio);	
				$('#datos_buttom').append(imprimirBoton('btn-danger btn-flat', 'btnCancelar', 'Cancelar'));				
			}			
			
				
	/**********************************************************************************************
		FUNCION PARA EL BOTON DE GUARDAR DEL FORMULARIO DE EQUIPO
	***********************************************************************************************/
			

			$('#datos_buttom').on('click', '#btnGuardar', function(){
				
				
				
				var dataString = {
					actpen: $("#actpen option:selected").val(),	
					numero: $("#numero").val(),	
					fecha_ingreso: $("#fecha_ingreso").val(),	
					paterno: $("#paterno").val(),
					materno: $("#materno").val(),
					nombre: $("#nombre").val(),
					fecha_nacimiento: $("#fecha_nacimiento").val(),	
					sexo: $("#sexo option:selected").val(),	
					id_estadocivil: $("#id_estadocivil option:selected").val(),	
					rfc: $("#rfc").val(),
					curp: $("#curp").val(),	
					nss: $("#nss").val(),
					ine: $("#ine").val(),	
					correo_electronico_personal: $("#correo_electronico_personal").val(),
					comentario: $("#comentario").val(),
					calle: $("#calle").val(),		
					no_exterior: $("#no_exterior").val(),
					no_interior: $("#no_interior").val(),
					colonia: $("#colonia").val(),
					cp: $("#cp").val(),
					id_vivienda: $("#id_vivienda option:selected").val(),	
					telefono_fijo: $("#telefono_fijo").val(),
					telefono_celular: $("#telefono_celular").val(),
					profesion: $("#profesion").val(),
					institucion: $("#institucion").val(),
					

				}

				console.log(dataString);

				$.ajax({
					type: 'POST',
					url: routeBase+'/expediente/actpen',
					data: dataString,
					dataType: 'json',
					success: function(data) {						
								messageToastr('success', data.message);							
					           	modal.modal('hide');
					           	window.location.replace(routeBase+'/expediente');						
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

							espacio = document.createTextNode(' ');
							$('#datos_buttom').empty();
							$('#datos_buttom').append(imprimirBoton('btn-success btn-flat', 'btnGuardar', 'Enviar de nuevo'));
							$('#datos_buttom').append(espacio);
							$('#datos_buttom').append(imprimirBoton('btn-danger btn-flat', 'btnCancelar', 'Cancelar / Regresar'));

							//footerModal.empty();
							//footerModal.append(imprimirBoton('btn-success', 'btn-submit-asig', 'Guardar'));
							//footerModal.append(imprimirBoton('btn-danger', 'btn-cancelar', 'Cancelar'));
					}
				});
			

			})	


			$('#datos_buttom').on('click', '#btnEditar', function(){
				
				
				var dataString = {
					actpen: $("#actpen option:selected").val(),	
					numero: $("#numero").val(),	
					fecha_ingreso: $("#fecha_ingreso").val(),	
					paterno: $("#paterno").val(),
					materno: $("#materno").val(),
					nombre: $("#nombre").val(),
					fecha_nacimiento: $("#fecha_nacimiento").val(),	
					sexo: $("#sexo option:selected").val(),	
					id_estadocivil: $("#id_estadocivil option:selected").val(),	
					rfc: $("#rfc").val(),
					curp: $("#curp").val(),	
					nss: $("#nss").val(),
					ine: $("#ine").val(),	
					correo_electronico_personal: $("#correo_electronico_personal").val(),
					comentario: $("#comentario").val(),
					calle: $("#calle").val(),		
					no_exterior: $("#no_exterior").val(),
					no_interior: $("#no_interior").val(),
					colonia: $("#colonia").val(),
					cp: $("#cp").val(),
					id_vivienda: $("#id_vivienda option:selected").val(),
					telefono_fijo: $("#telefono_fijo").val(),
					telefono_celular: $("#telefono_celular").val(),
					profesion: $("#profesion").val(),
					institucion: $("#institucion").val()

				}

				console.log(dataString);

				$.ajax({
					type: 'PUT',
					url: routeBase+'/expediente/update/'+actpen.id,
					data: dataString,
					dataType: 'json',
					success: function(data) {						
								messageToastr('success', data.message);							
					           	modal.modal('hide');
					           	window.location.replace(routeBase+'/expediente');						
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

							espacio = document.createTextNode(' ');
							$('#datos_buttom').empty();
							$('#datos_buttom').append(imprimirBoton('btn-success btn-flat', 'btnEditar', 'Editar'));
							$('#datos_buttom').append(espacio);
							$('#datos_buttom').append(imprimirBoton('btn-danger btn-flat', 'btnCancelar', 'Cancelar / Regresar'));

							//footerModal.empty();
							//footerModal.append(imprimirBoton('btn-success', 'btn-submit-asig', 'Guardar'));
							//footerModal.append(imprimirBoton('btn-danger', 'btn-cancelar', 'Cancelar'));
					}
				});
			

			})	




			/*DIRECCIONAMIENTO DE BOTÓN CANCELAR*/
			$('#datos_buttom').on('click', '#btnCancelar', function(){
				window.location.replace(routeBase+'/expediente');	

			})	

		}); // FIN DE LA FUNCION JAVASCRIPT
		

	</script>