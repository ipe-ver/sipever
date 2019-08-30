
	var catOpcion			= [{valor: 'SI', descripcion: 'SI'},{valor: 'NO', descripcion: 'NO'}];
	var catOpcionInverso	= [{valor: 'NO', descripcion: 'NO'},{valor: 'SI', descripcion: 'SI'}];
	var catDocumentos 		= [{valor:'NO ESPECIFICADO', descripcion: 'NO ESPECIFICADO'},
								{valor:'ES RECIEN NACIDO', descripcion: 'ES RECIEN NACIDO'},
								{valor:'VALIDO CON CURP', descripcion: 'VALIDO CON CURP'},
								{valor:'VALIDO CON CREDENCIAL DE IDENTIFICACIÓN', descripcion: 'VALIDO CON CREDENCIAL DE IDENTIFICACIÓN'},
								{valor:'VALIDO CON RFC', descripcion: 'VALIDO CON RFC'}];
	var catTiposDomicilio	= [{valor:'PERMANENTE',descripcion: 'PERMANENTE'},{valor:'TEMPORAL',descripcion: 'TEMPORAL'}];



	function limpiarModal() {
		tituloModal.empty()
		bodyModal.empty()
		footerModal.empty()
	}

	function consultarPersona( id ){
		$.get( routeBase+'/componente/persona/'+id )
		.done(function( data ) {
			console.log(data);
			return $data;
		});
	}

	var componentPerson = function(divContent, id){	
		HoldOn.open(optionsHoldOn);
		divContent.empty();
		$.when( 
			$.ajax( routeBase+'/api/catalogos/estados_nacimiento' ),
			$.ajax( routeBase+'/api/catalogos/estados_civiles' ),
			$.ajax( routeBase+'/api/catalogos/tipos_sangre' ),
			$.ajax( routeBase+'/api/catalogos/nacionalidades' ),
			$.ajax( routeBase+'/api/catalogos/ocupaciones' ),
			$.ajax( routeBase+'/api/catalogos/escolaridades' ),
			$.ajax( routeBase+'/api/catalogos/religiones' ),
			$.ajax( routeBase+'/api/catalogos/generos' ),
			$.ajax( routeBase+'/componente/persona/'+id )
		)
		.done(function( data1, data2, data3, data4, data5, data6, data7, data8, data9 ) {
			HoldOn.close();
			
			let catEstadosNac 		= data1[0];
			let catEstadosCiviles 	= data2[0];
			let catTiposSangre 		= data3[0];
			let catNacionalidades	= data4[0];
			let catOcupaciones		= data5[0];
			let catEscolaridades	= data6[0];
			let catReligiones		= data7[0];
			let catSexos			= data8[0];
			let data				= (Object.keys(data9[0]).length)? data9[0] : '';
			
			campos1 = estilo_modal.mostrar([
				{campo:'input',idCampo:'primer_apellido',nameCampo:'Primer apellido:',typeCampo:'text',valorCampo: (data)? data.primer_apellido : '', placeholder:'Ingrese su primer apellido',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'segundo_apellido',nameCampo:'Segundo apellido:',typeCampo:'text',valorCampo: (data)? data.segundo_apellido : '', placeholder:'Ingrese su segundo apellido',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'nombres',nameCampo:'Nombre(s):',typeCampo:'text',valorCampo: (data)? data.nombres : '', placeholder:'Ingrese su nombre (s)',newClass:'mayuscula',divSize:'4',datos:''},
			]);

			campos2 = estilo_modal.mostrar([
				{campo:'input',idCampo:'fecha_nacimiento',nameCampo:'Fecha nacimiento:',typeCampo:'text',valorCampo: (data)? data.fecha_nacimiento : '', placeholder:'',newClass:'',divSize:'4',datos:''},
				{campo:'select',idCampo:'estado_nacimiento',nameCampo:'Estado de nacimiento:',typeCampo:'text',valorCampo: (data)? data.estado_nacimiento : '', placeholder:'',newClass:'',divSize:'4',datos: catEstadosNac},
				{campo:'select',idCampo:'sexo',nameCampo:'Sexo:',typeCampo:'',valorCampo: (data)? data.sexo : '', placeholder:'',newClass:'',divSize:'4',datos: catSexos},
			]);

			campos3 = estilo_modal.mostrar([            
				{campo:'select',idCampo:'id_nacionalidad',nameCampo:'Nacionalidad:',typeCampo:'text', valorCampo: (data)? data.id_nacionalidad : '', placeholder:'',newClass:'',divSize:'4',datos: catNacionalidades},
				{campo:'input',idCampo:'curp',nameCampo:'CURP:',typeCampo:'text',valorCampo: (data)? data.curp : '', placeholder:'CURP', newClass:'input-lg mayuscula', divSize:'4', datos:''},
				{campo:'input',idCampo:'rfc',nameCampo:'RFC:',typeCampo:'text',valorCampo: (data)? (data.rfc == 'null')? data.rfc : '' : '', placeholder:'RFC', newClass:'input-lg mayuscula', divSize:'4', datos:''},	

			]);
		   
			campos4 = estilo_modal.mostrar([
				{campo:'select',idCampo:'id_estadocivil',nameCampo:'Edo. Civil:',typeCampo:'',valorCampo: (data)? data.id_estadocivil : '', placeholder:'',newClass:'',divSize:'4',datos: catEstadosCiviles, defaultOption: false},
				{campo:'select',idCampo:'id_religion',nameCampo:'Religión:',typeCampo:'text',valorCampo: (data)? data.id_religion : '',placeholder:'',newClass:'',divSize:'4',datos: catReligiones },            
				{campo:'select',idCampo:'id_tiposangre',nameCampo:'Tipo de sangre:',typeCampo:'',valorCampo: (data)? data.id_tiposangre : '', placeholder:'',newClass:'',divSize:'4',datos: catTiposSangre, defaultOption: false},
			]);

			campos5 = estilo_modal.mostrar([
				{campo:'select',idCampo:'id_escolaridad',nameCampo:'Escolaridad:',typeCampo:'',valorCampo: (data)? data.id_escolaridad : '', placeholder:'',newClass:'',divSize:'4',datos: catEscolaridades},
				{campo:'select',idCampo:'id_ocupacion',nameCampo:'Ocupación:',typeCampo:'',valorCampo: (data)? data.id_ocupacion : '', placeholder:'',newClass:'',divSize:'4',datos: catOcupaciones},
			]);

			campos5 = estilo_modal.mostrar([
				{campo:'select',idCampo:'curp_verificada',nameCampo:'CURP verificada:',typeCampo:'',valorCampo: (data)? data.curp_verificada : '', placeholder:'',newClass:'',divSize:'4',datos: catOpcionInverso, defaultOption: false},
				{campo:'select',idCampo:'motivo_verificacion_curp',nameCampo:'Documento validación del CURP:',typeCampo:'',valorCampo: (data)? data.id_ocupacion : '', placeholder:'',newClass:'',divSize:'4',datos: catDocumentos, defaultOption: false},
			]);

			campos6 = estilo_modal.mostrar([
				{campo:'input',idCampo:'correo',nameCampo:'Correo electrónico personal:',typeCampo:'text',valorCampo: (data)? data.correo : '', placeholder: 'Correo electrónico personal',newClass:'',divSize:'4',datos:''},
				{campo:'input',idCampo:'correo_institucional',nameCampo:'Correo electrónico institucional:',typeCampo:'text',valorCampo: (data)? data.correo_institucional : '', placeholder:'Correo elctrónico institucional',newClass:'',divSize:'4',datos:''},
				{campo:'input',idCampo:'celular',nameCampo:'Teléfono celular:',typeCampo:'text',valorCampo: (data)? data.celular : '', placeholder:'000 000 0000',newClass:'mayuscula',divSize:'4',datos:''},
			]);

			divContent.append(campos1, campos2, campos3, campos4, campos5,campos6);

			maskFecha.mask($("#fecha_nacimiento"));
			$('#estado_nacimiento,#id_nacionalidad,#id_estadoCivil,#id_religion,#id_tipoSangre,#id_escolaridad,#id_ocupacion').selectpicker();

			divContent.on('change', '#curp_verificada', function(){
				if($(this).val() == 'NO') {
					$('#motivo_verificacion_curp').val('NO ESPECIFICADO');
				} else {
					 $("#motivo_verificacion_curp :not(option:gt(0))").attr("disabled", "disabled");
					 $('#motivo_verificacion_curp').val('VALIDO CON CURP');
				}
			});

			divContent.on('change', '#fecha_nacimiento, #estado_nacimiento, #sexo', function(){
				primer_apellido 		= $("#primer_apellido").val();
				segundo_apellido		= $("#segundo_apellido").val();
				nombres 				= $("#nombres").val();
				fecha_nacimiento 		= $("#fecha_nacimiento").val();
				estado_nacimiento		= $("#estado_nacimiento option:selected").val();
				sexo 					= ($("#sexo option:selected").val()).substr(0,1);
				
				if(fecha_nacimiento.length > 0 && estado_nacimiento.length > 0 && sexo.length > 0){
					fecha = fecha_nacimiento.split("/");
					let curp = generaCurp({
						nombre            : nombres,
						apellido_paterno  : primer_apellido,
						apellido_materno  : segundo_apellido,
						sexo              : sexo,
						estado            : estado_nacimiento,
						fecha_nacimiento  : [fecha[0], fecha[1], fecha[2]]
					});
					$('#curp').val(curp);
					$('#rfc').val(curp.substring(0,10));
				}
			})
		});
	}

	var showComponentPerson = function(divContent,id){
		HoldOn.open(optionsHoldOn);
		divContent.empty();

		$.get( routeBase+'/componente/persona/'+id )
		.done(function( data ) {
			console.log(data);
			html = '<div class="row">';		
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Primer apellido:</p>';
			html += '<h3 class="profile-username text-left">'+data.primer_apellido+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Segundo apellido:</p>';
			html += '<h3 class="profile-username text-left">'+data.segundo_apellido+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Nombres:</p>';
			html += '<h3 class="profile-username text-left">'+data.nombres+'</h3>';		
			html += '</div>';
			html += '</div>';

			html += '<div class="row">';		
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Fecha de nacimiento:</p>';
			html += '<h3 class="profile-username text-left">'+data.fecha_nacimiento+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Estado de nacimiento:</p>';
			html += '<h3 class="profile-username text-left">'+data.estado+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Sexo:</p>';
			html += '<h3 class="profile-username text-left">'+data.sexo+'</h3>';		
			html += '</div>';		
			html += '</div>';

			html += '<div class="row">';		
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Nacionalidad:</p>';
			html += '<h3 class="profile-username text-left">'+data.nacionalidad+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">CURP:</p>';
			html += '<h3 class="profile-username text-left">'+data.curp+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">RFC:</p>';
			html += '<h3 class="profile-username text-left">'+data.rfc+'</h3>';		
			html += '</div>';		
			html += '</div>';

			html += '<div class="row">';		
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Edo. Civil:</p>';
			html += '<h3 class="profile-username text-left">'+data.estado_civil+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Religión:</p>';
			html += '<h3 class="profile-username text-left">'+data.religion+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Tipo de sangre:</p>';
			html += '<h3 class="profile-username text-left">'+data.tipo_sangre+'</h3>';		
			html += '</div>';		
			html += '</div>';

			html += '<div class="row">';		
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">CURP verificada:</p>';
			html += '<h3 class="profile-username text-left">'+data.curp_verificada+'</h3>';		
			html += '</div>';
			html += '<div class="form-group col-md-4">';
			html += '<p class="text-muted text-left">Motivo de validación del CURP::</p>';
			html += '<h3 class="profile-username text-left">'+data.motivo_verificacion_curp+'</h3>';		
			html += '</div>';
			html += '</div>';

			html += '<div class="row">';
			$.each(data.medios_comunicacion, function(key, value){
				html += '<div class="form-group col-md-4">';
				html += '<p class="text-muted text-left">'+value.tipo+':</p>';
				html += '<h3 class="profile-username text-left">'+value.descripcion+'</h3>';
				html += '</div>';
			});
			html += '</div>';


			divContent.append(html);		
		});
		HoldOn.close();
	}

	var componentEmpleado = function(divContent, idPersona, idEmpleado){
		HoldOn.open(optionsHoldOn);
		divContent.empty();
		$.when(
			$.ajax( routeBase+'/api/catalogos/tipos_empleados' ),
			$.ajax( routeBase+'/api/catalogos/plazas' ),
			$.ajax( routeBase+'/api/catalogos/recursos' ),
			$.ajax( routeBase+'/api/catalogos/financiamientos' ),
			$.ajax( routeBase+'/api/catalogos/puestos' ),
			$.ajax( routeBase+'/api/catalogos/categorias' ),
			$.ajax( routeBase+'/api/catalogos/departamentos' ),
			$.ajax( routeBase+'/api/catalogos/atenciones_medicas' ),
			$.ajax( routeBase+'/api/catalogos/guardias' ),
			$.ajax( routeBase+'/api/catalogos/sindicatos' ),
			$.ajax( routeBase+'/api/catalogos/pago_riesgos' ),
			$.ajax( routeBase+'/api/catalogos/pensiones' ),
			$.ajax( routeBase+'/api/catalogos/turnos' ),
			$.ajax( routeBase+'/recursos_humanos/empleados/get_empleado/'+idEmpleado ),
		)
		.done(function( data1, data2, data3, data4, data5, data6, data7, data8, data9, data10, data11, data12, data13, data14 ) {
			HoldOn.close();
			
			let catTiposEmpleado 	= data1[0];
			let catPlazas			= data2[0];
			let catRecursos 		= data3[0];
			let catFinanciamientos	= data4[0];
			let catPuestos			= data5[0];
			let catCategorias		= data6[0];
			let catDepartamentos	= data7[0];
			let catAtencionMedica	= data8[0];
			let catGuardias 		= data9[0];
			let catSindicatos 		= data10[0];
			let catPagosRiesgo 		= data11[0];
			let catPensiones 		= data12[0];
			let catTurnos	 		= data13[0];
			let data				= (Object.keys(data14[0]).length)? data14[0] : '';

			campos1 = estilo_modal.mostrar([
				{campo:'select',idCampo:'id_tipoempleado',nameCampo:'Tipo empleado:',typeCampo:'',valorCampo: (data)? data.id_tipoempleado: '', placeholder:'',newClass:'',divSize:'4',datos: catTiposEmpleado, defaultOption: false},
				{campo:'select',idCampo:'id_plaza',nameCampo:'Tipo plaza:',typeCampo:'',valorCampo: (data)? data.id_plaza: '', placeholder:'',newClass:'',divSize:'4',datos: catPlazas, defaultOption: false},
				{campo:'select',idCampo:'nombramiento',nameCampo:'Nombramiento:',typeCampo:'',valorCampo: (data)? data.nombramiento: '', placeholder:'',newClass:'',divSize:'4',datos: catOpcionInverso, defaultOption: false, extras: 'disabled'},
			]);

			campos2 = estilo_modal.mostrar([
				{campo:'select',idCampo:'id_tiporecurso',nameCampo:'Tipo de recurso:',typeCampo:'',valorCampo: (data)? data.id_tiporecurso: '', placeholder:'',newClass:'',divSize:'4',datos: catRecursos, defaultOption: false},
				{campo:'select',idCampo:'id_pension',nameCampo:'Pension:',typeCampo:'',valorCampo: (data)? data.id_pension: '', placeholder:'',newClass:'',divSize:'4',datos: catPensiones, extras: 'disabled', defaultOption: false},
				{campo:'select',idCampo:'id_financiamiento',nameCampo:'Fuente de financiamiento:',typeCampo:'',valorCampo: (data)? data.id_financiamiento: '', placeholder:'',newClass:'',divSize:'4',datos: catFinanciamientos, extras: (data && data.id_plaza == 4)? '': 'disabled', defaultOption: false},
			
			]);

			campos3 = estilo_modal.mostrar([
				{campo:'input',idCampo:'fecha_alta',nameCampo:'Fecha de alta:',typeCampo:'text',valorCampo: (data)? data.fecha_alta: '', placeholder:'Fecha de alta',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'fecha_base',nameCampo:'Fecha de base:',typeCampo:'text',valorCampo: (data)? data.fecha_base: '', placeholder:'Fecha de base',newClass:'mayuscula',divSize:'4',datos:'', extras: (data && data.id_plaza == 2)? '': 'disabled'},
			]);

			campos4 = estilo_modal.mostrar([
				{campo:'select',idCampo:'id_puesto',nameCampo:'Puesto:',typeCampo:'',valorCampo: (data)? data.id_puesto: '', placeholder:'',newClass:'',divSize:'4',datos: catPuestos},
				{campo:'select',idCampo:'id_categoria',nameCampo:'Codigo federal (Categoría):',typeCampo:'',valorCampo: (data)? data.id_categoria: '', placeholder:'',newClass:'',divSize:'4',datos: catCategorias},
				{campo:'select',idCampo:'id_departamento',nameCampo:'Departamento:',typeCampo:'',valorCampo: (data)? data.id_departamento: '', placeholder:'',newClass:'',divSize:'4',datos: catDepartamentos},
			]);

			campos5 = estilo_modal.mostrar([
				{campo:'select',idCampo:'atencion_medica',nameCampo:'Atención médica en:',typeCampo:'',valorCampo:(data)? data.atencion_medica: '', placeholder:'',newClass:'',divSize:'4',datos:catAtencionMedica, defaultOption: false},
				{campo:'input',idCampo:'numero_afiliacion',nameCampo:'Número de afiliación:',typeCampo:'text',valorCampo: (data)? data.numero_afiliacion: '', placeholder:'No afiliación',newClass:'mayuscula',divSize:'4',datos:'', extras: (data && data.id_plaza == 2)? '': 'disabled'},
			]);	

			campos6 = estilo_modal.mostrar([
				{campo:'select',idCampo:'id_turno',nameCampo:'Turno:',typeCampo:'',valorCampo: (data)? data.id_turno: '', placeholder:'',newClass:'',divSize:'4',datos: catTurnos},
				{campo:'input',idCampo:'hora_entrada',nameCampo:'Hora de entrada:',typeCampo:'text',valorCampo: (data)? data.hora_entrada: '', placeholder:'Número exterior',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'hora_salida',nameCampo:'Hora de salida:',typeCampo:'text',valorCampo: (data)? data.hora_salida: '', placeholder:'Número interior',newClass:'mayuscula',divSize:'4',datos:''},
			]);

			campos7 = estilo_modal.mostrar([
				{campo:'select',idCampo:'guardias',nameCampo:'Guardia:',typeCampo:'',valorCampo: (data)? data.guardias: '', placeholder:'',newClass:'',divSize:'4',datos: catGuardias, defaultOption: false, extras: 'multiple'},
				{campo:'select',idCampo:'id_sindicato',nameCampo:'Sindicato:',typeCampo:'',valorCampo: (data)? data.id_sindicato: '', placeholder:'',newClass:'',divSize:'4',datos: catSindicatos, defaultOption: false},
				{campo:'select',idCampo:'pago_riesgo',nameCampo:'Descontaminación:',typeCampo:'',valorCampo: (data)? data.pago_riesgo: '', placeholder:'',newClass:'',divSize:'4',datos: catPagosRiesgo, defaultOption: false},
			]);

			campos8 = estilo_modal.mostrar([
				{campo:'select',idCampo:'checa',nameCampo:'Extensión de registro:',typeCampo:'',valorCampo: (data)? data.checa: '', placeholder:'',newClass:'',divSize:'4',datos: catOpcion, defaultOption: false},
				{campo:'select',idCampo:'compatibilidad',nameCampo:'Tienes otra contratación en SSAVER:',typeCampo:'',valorCampo: (data)? data.interino: '', placeholder:'',newClass:'',divSize:'4',datos: catOpcionInverso, defaultOption: false},
				{campo:'select',idCampo:'madre',nameCampo:'Padre o Madre de Familia:',typeCampo:'text',valorCampo: (data)? data.madre: '', placeholder:'',newClass:'',divSize:'4',datos: catOpcionInverso, defaultOption: false},
			]);

			campos9 = estilo_modal.mostrar([				
				{campo:'textarea',idCampo:'observaciones',nameCampo:'Observaciones:',typeCampo:'textarea',valorCampo: (data)? data.observaciones: '', placeholder:'',newClass:'mayuscula',divSize:'12',datos:''},
			]);

			campos10 = estilo_modal.mostrar([
				{campo:'input',idCampo:'id_persona', nameCampo:'',typeCampo:'hidden',valorCampo: idPersona, placeholder:'', newClass:'', divSize:'', datos:''},
			]);

			divContent.append(campos1, campos2, campos3, campos4, campos5,campos6, campos7, campos8, campos9, campos10);
				
			maskFecha.mask($("#fecha_alta,#fecha_base"));

			$('#hora_entrada').datetimepicker({
				format: 'HH:mm'
			});

			$('#hora_salida').datetimepicker({
				format: 'HH:mm',
				useCurrent: false
			});

			$('#id_tipoempleado').selectpicker();
			$('#id_plaza').selectpicker();
			$('#id_tiporecurso').selectpicker();
			$('#id_puesto').selectpicker();
			$('#id_categoria').selectpicker();
			$('#id_departamento').selectpicker();
			$('#guardias').selectpicker();
			$('#id_sindicato').selectpicker();
			$('#pago_riesgo').selectpicker();
			$('#id_banco').selectpicker();
			$('#atencion_medica').selectpicker();

			divContent.on('change', '#id_tipoempleado', function(){				
				if($(this).val() == '5') {
					$('#id_financiamiento').prop("disabled", false);
				} else {
					$('#id_financiamiento').prop("disabled", true);
					$('#id_financiamiento').val('1');
				}

				if($(this).val() == '2'){
					$('#fecha_base').prop("disabled", false);
					$('#nombramiento').prop("disabled", false);
				} else {
					$('#fecha_base').prop("disabled", true);
					$('#fecha_base').val('');
					$('#nombramiento').prop("disabled", true);
					$('#fecha_base').val('NO');

				}
			})

			divContent.on('change', '#id_tiporecurso', function(){

				switch ($(this).val()) {
					case '1':
						$('#id_pension').val('1');
						break;
					case '2':
						$('#id_pension').val('2');
						break;
					default:
						$('#id_pension').val('3');
				}

			})
		});

	}


	var validateCurpPerson = function(divContent){
		divContent.empty();
		divContent.on('change', function(){
			let curp = $('#curp').val();
			
			if(curp.length == 18){
				$.get( routeBase+'/api/componente/persona/validar_curp', {curp: curp} )
				.done(function( data ) {
					if(data.length){
						tituloModal.empty();
						bodyModal.empty();
						footerModal.empty();

						tituloModal.append('Ya existe una persona registrada con este CURP:');

						html = '<table class="table"><thead><tr>';
						html += '<th>CURP</th>';
						html += '<th>Nombre completo</th>';
						html += '<th>Sexo</th>';
						html += '<th>Fecha nacimiento</th>';
						html += '<th>Estado nacimiento</th>';
						html += '<th>Acciones</th>';
						html += '</tr></thead><tbody>';
						$.each(data, function(key, value){								
							html += '<tr><td>'+value.curp+'</td>';
							html += '<td>'+value.nombre_completo+'</td>';
							html += '<td>'+value.sexo+'</td>';
							html += '<td>'+value.fecha_nacimiento+'</td>';
							html += '<td>'+value.estado+'</td>';
							html += '<td><button id="btnMostrarDatosPersona" data-id="'+value.id+'" class="btn btn-sm btn-gb-gray">Cargar</button></td></tr>';
						});	
						html += "</tbody></table>";					

						bodyModal.append(html);
						footerModal.append();

						modal.modal('show');
					}
				})
			}
		})
	}

	/** Componente domicilio **/
	var componentDomicilioPersona = function(divContent = null, datos = null){
		HoldOn.open(optionsHoldOn);
		divContent.empty();
		$.when(
			$.ajax( routeBase+'/api/catalogos/estados' ),
		)
		.done(function( data1 ) {
			HoldOn.close();
			let catEstados 	= data1;
			
			camposA = estilo_modal.mostrar([
				{campo:'select',idCampo:'tipo',nameCampo:'Tipo:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: catTiposDomicilio, defaultOption: false },
			]);

			camposB = estilo_modal.mostrar([
				{campo:'input',idCampo:'calle',nameCampo:'Calle:',typeCampo:'text',valorCampo: '', placeholder:'Calle',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'num_exterior',nameCampo:'No ext:',typeCampo:'text',valorCampo: '', placeholder:'Número exterior',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'num_interior',nameCampo:'No int:',typeCampo:'text',valorCampo: '', placeholder:'Número interior',newClass:'mayuscula',divSize:'4',datos:''},
			]);
			
			camposC = estilo_modal.mostrar([
				{campo:'select',idCampo:'estado',nameCampo:'Estado:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'4',datos: catEstados},
				{campo:'select',idCampo:'municipio',nameCampo:'Municipio:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'4',datos: ''},
				{campo:'select',idCampo:'asentamiento',nameCampo:'Asentamiento:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'4',datos: ''},
			]);
			
			camposD = estilo_modal.mostrar([
				{campo:'input',idCampo:'cp',nameCampo:'CP:',typeCampo:'text',valorCampo: '', placeholder:'Código postal',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'telefono',nameCampo:'No. telefóno:',typeCampo:'text',valorCampo: '', placeholder:'Teléfono',newClass:'mayuscula',divSize:'4',datos:''},
			]);

			camposE = estilo_modal.mostrar([			
				{campo:'input',idCampo:'entre_calle',nameCampo:'Entre calle:',typeCampo:'text',valorCampo: '', placeholder:'Entre calle',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'y_calle',nameCampo:'y calle:',typeCampo:'text',valorCampo: '', placeholder:'y calle',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'calle_posterior',nameCampo:'Calle posterior:',typeCampo:'text',valorCampo: '', placeholder:'Calle posterior',newClass:'mayuscula',divSize:'4',datos:''},
				{campo:'input',idCampo:'descripcion_ubicacion',nameCampo:'Referencias:',typeCampo:'text',valorCampo: '', placeholder:'Referencias',newClass:'mayuscula',divSize:'12',datos:''},
			]);
			
			divContent.append(camposA, camposB, camposC, camposD, camposE);
		});

		divContent.on('change', '#estado', function(){		
			idEstado = $(this).val();
			divSend = '#municipio';
			$('#div_municipio').remove();
			campos = estilo_modal.select(idCampo = 'municipio', nameCampo = 'Municipio:', newClass = '', divSize = '4', datos = '');
			$('#div_estado').after(campos);
			cargarMunicipios(idEstado, idSelect = null, divSend);
		});

		divContent.on('change', '#municipio', function(){            
			idMunicipio = $(this).val();
			divSend = '#asentamiento';
			$('#div_asentamiento').remove();
			campos = estilo_modal.select(idCampo = 'asentamiento', nameCampo = 'Asentamiento:', newClass = '', divSize = '4', datos = '');
			$('#div_municipio').after(campos);
			cargarLocalidades(idMunicipio, idSelect = null, divSend);
		});

		divContent.on('change', '#asentamiento', function(){
			idAsentamiento = $(this).val();
			cargarCodigoPostal(idAsentamiento, divSend = '#cp');
		});

		/** Fin componente domicilio **/

	};















