	$("body").on('change', '.mayuscula', function(field){
	//$(".mayuscula").keyup(function() {
		$(this).val($(this).val().toUpperCase());
		//field.value = field.value.toUpperCase()
	});

	var optionsHoldOn = {
		theme:"sk-folding-cube",
		message:'<h1>Procesando su información, por favor espere un momento... </h1>',
		backgroundColor:"#AEAEAF",
		textColor:"white"
	};
	
	var catalogo_camas = {
		cama: function(idCama, edoCama, noCama ){
			var divCol 	= $('<div class="col-md-3 col-sm-6 col-xs-12">');
			var divInfo = $('<div class="info-box">');							
			var icon 	= $('<i class="fa fa-bed"></i>');
			var boxCon 	= $('<div class="info-box-content">');
			var label 	= $('<label>');							
			var spanNo  = $('<span class="info-box-number">').text(noCama);

			switch(edoCama) {
				case 'L':
					var spanIcon = $('<span class="info-box-icon bg-green">');
					var radio 	= $('<input type="radio" name="id_cama" id="id_cama" value="'+idCama+'" >');
					var spanEdo	= $('<span class="info-box-text">').text('LIBRE');
					break;
				case 'O':
					var spanIcon = $('<span class="info-box-icon bg-red">');
					var radio 	= $('<input type="radio" name="id_cama" id="id_cama" value="'+idCama+'" disabled >');
					var spanEdo	= $('<span class="info-box-text">').text('OCUPADA');
					break;
				default:
					console.log('No tomo los datos');									
			}						

			label.append(radio);
			boxCon.append(label);
			boxCon.append(spanEdo);
			boxCon.append(spanNo);
			spanIcon.append(icon);
			divInfo.append(spanIcon);							
			divInfo.append(boxCon);							
			divCol.append(divInfo);							
			
			return divCol;
		},
		mostrar: function(camas){							
			$('#div_id_cama').remove();
			var divRow = $('<div class="row" id="div_id_cama">');			
			divRow.append($('<span id="error_id_cama" class="help-block"></span>'));
			for (var i = 0; i < camas.length; i++){
				divRow.append(this.cama(camas[i]['id'],
										camas[i]['estatus'],
										camas[i]['nombre']
							));
			}
			return divRow;

		}
	};

	var cargarEspecialidades = function(idServicio = 0, idSelect = null, divSize = 4){		
		//routeConsulta variable global en layoute plantilla.
		$.getJSON(routeConsulta+'/especialidades/'+idServicio)
		.done(function(data){				
			optionSelect = '';

			$('#div_id_especialidad').remove();
			campos = estilo_modal.select(idCampo = 'id_especialidad', nameCampo = 'Especialidad:', newClass = '', divSize, datos = '');
			$('#div_id_servicio').after(campos);
			
			//$('#id_especialidad').append('<option>[SELECCIONE UNA OPCION]</option>');					
			$.each(data, function(key, value){						
				optionSelect = optionSelect+'<option ';
				if (idSelect == value.id) { optionSelect = optionSelect+' selected'; }
				optionSelect = optionSelect+' value='+value.id+'>'+value.nombre+'</option>';					
			});					
			$('#id_especialidad').append(optionSelect);
			$('#id_especialidad').selectpicker();
		})
	}

	var cargarCamas = function(idArea = 0, campo = null){
		$.getJSON(routeConsulta+'/camas/'+idArea)
		.done(function(data){
			camas = catalogo_camas.mostrar(data);
			campo.append(camas);
		})
	}

	var estilo_modal = {
		divRow: function() {
			return $('<div class="row">');
		},

		divCol: function(divSize){
			return $('<div class="col-md-'+divSize+'">');
		},
		textArea: function (idCampo, nameCampo, typeCampo, valorCampo, placeholder, newClass, divSize){
			var div = $('<div id=div_'+idCampo+' class="form-group col-md-'+divSize+'">');
			var label = $('<label for="'+idCampo+'">').text(nameCampo);
			var textarea = $('<textarea rows="3" class="form-control '+newClass+'" id="'+idCampo+'" placeholder="'+placeholder+'"> '+valorCampo+'</textarea>');
			var span = $('<span id="error_'+idCampo+'" class="help-block"></span>');	

			div.append(label);
			div.append(textarea);
			div.append(span);

			return div;
		},			
		input: function(idCampo, nameCampo, typeCampo, valorCampo, placeholder, newClass, divSize, extras){			
			var div = $('<div id=div_'+idCampo+' class="form-group col-md-'+divSize+'">');
			var label = $('<label for="'+idCampo+'">').text(nameCampo);
			var input = $('<input type="'+typeCampo+'" class="form-control '+newClass+'" id="'+idCampo+'" placeholder="'+placeholder+'" value="'+valorCampo+'" '+extras+' />');
			var span = $('<span id="error_'+idCampo+'" class="help-block"></span>');			
			if (typeCampo == "hidden") {
				div.append(input);	
			} else {
				div.append(label);
				div.append(input);
				div.append(span);
			}			
			return div;
		},
		file: function(idCampo, nameCampo, newClass, divSize){			
			//var divCol = $('<div class="col-md-'+divSize+'">');
			var div = $('<div id=div_'+idCampo+' class="form-group col-md-'+divSize+'">');
			var label = $('<label for="'+idCampo+'">').text(nameCampo);
			var input = $('<input type="file" class="'+newClass+'" id="'+idCampo+'"  />');
			var span = $('<span id="error_'+idCampo+'" class="help-block"></span>');
			//divCol.append(div);
			div.append(label);
			div.append(input);
			div.append(span);
			
			return div;
		},		
		option: function(valor,descripcion,valorCampo){
			
			valorSeleccionado = ($.isArray(valorCampo))? valorCampo : [valorCampo];
			
			opt = '<option ';
			if($.inArray(valor, valorSeleccionado) !== -1){ opt = opt+'selected '; }
			opt = opt+' value="'+valor+'">'+descripcion+'</option>';
			
			return opt;
		},
		select: function(idCampo, nameCampo, newClass, divSize, datos, valorCampo, defaultOption = true, extras = ''){			
			//var divCol = $('<div class="col-md-'+divSize+'">');
			var div = $('<div id=div_'+idCampo+' class="form-group col-md-'+divSize+'">');
			var label = $('<label for="'+idCampo+'">').text(nameCampo);
			var select = $('<select name="'+idCampo+'" id="'+idCampo+'" class="form-control '+newClass+'" data-live-search="true" '+extras+' >');
			var span = $('<span id="error_'+idCampo+'" class="help-block"></span>');
			if(defaultOption) { select.append(this.option('', '[SELECCIONE UNA OPCION]', valorCampo)); }			
			for (var i = 0; i < datos.length; i++) {
				select.append(this.option(datos[i]['valor'], datos[i]['descripcion'], valorCampo));
			}
			//divCol.append(div);
			div.append(label);
			div.append(select);
			div.append(span);

			return div;
		},
		detalle: function(divSizeClass, valorCampo, typeIcon, nombreCampo){			
			var campo = $('<div class="col-md-'+divSizeClass+'">');
			var valor = $('<strong>').append(valorCampo);
			var titulo = $('<p class="text-muted" ><i class="fa '+typeIcon+' margin-r-5"></i> '+nombreCampo+'</p> ');
			campo.append(valor);
			campo.append(titulo);

			return campo;
			
		},
		mostrar: function(campos){
					
			var divRow = this.divRow();

			for (var i = 0; i < campos.length; i++){
				switch(campos[i]['campo']) {
					case 'input':											
						divRow.append(this.input(campos[i]['idCampo'],
													campos[i]['nameCampo'],
													campos[i]['typeCampo'],
													campos[i]['valorCampo'],
													campos[i]['placeholder'],
													campos[i]['newClass'],
													campos[i]['divSize'],
													campos[i]['extras']
												));
						break;						
					case 'select':					
						divRow.append(this.select(campos[i]['idCampo'],
													campos[i]['nameCampo'],
													campos[i]['newClass'],
													campos[i]['divSize'],
													campos[i]['datos'],
													campos[i]['valorCampo'],
													campos[i]['defaultOption'],
													campos[i]['extras']
												));
						break;
					case 'detalle':					
						divRow.append(this.detalle(campos[i]['divSizeClass'],
													campos[i]['valorCampo'],
													campos[i]['typeIcon'],
													campos[i]['nombreCampo']
												));
						break;
					case 'file':						
						divRow.append(this.file(campos[i]['idCampo'],
													campos[i]['nameCampo'],
													campos[i]['newClass'],
													campos[i]['divSize']
												));
						break;
					case 'textarea':						
						divRow.append(this.textArea(campos[i]['idCampo'],
													campos[i]['nameCampo'],
													campos[i]['typeCampo'],
													campos[i]['valorCampo'],
													campos[i]['placeholder'],
													campos[i]['newClass'],
													campos[i]['divSize']
												));
						break;
					default:
						console.log('El campo en la posicion: '+i+' no se puede agregar');
						
				}

			}

			return divRow;
		}
	};

	var imprimirBoton = function(color, idButton, nombre, opciones){
		return '<button type="button" class="btn '+color+'" id="'+idButton+'" '+opciones+'>'+nombre+'</button>';
	}

	var messageToastr = function(tipo, mensaje){
		toastr.options = {
			"positionClass": "toast-top-right",
			"progressBar": true,
			"newestOnTop": true,
		}
		switch(tipo) {
			case 'success':
				toastr.success(mensaje);
				break;
			case 'info':
				toastr.warning(mensaje)
				break;
			case 'error':
				toastr.error(mensaje)
				break;					
			default:
				toastr.info(mensaje)
		}				
	}

	var validarDatos = function(errors = null){
		$('.modal-body input.text-red').removeClass('text-red');
		$('.modal-body div.has-error').removeClass('has-error');
		$('.modal-body span').empty();
		$.each(errors, function(i, item) {
			console.log(i+' valor: '+item);
			if (item) {
				$('#'+i).addClass('text-red');
				$('#div_'+i).addClass('has-error');
				$('#error_'+i).append(item);
			}							
		});
	}

	var optionsHospital = {				
		ajax: {
			url: routeBase+'/consulta/consultar_clues',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Selecciona un hospital'
		},
		//log: 3,
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nom_uni,
						value: data[i].id,
						data: {
							subtext: data[i].clues,									
						}
					}));
				}
			}					
			return array;
		}
	};

	var optionsDiagnosticos = {				
		ajax: {
			//contentType: "application/json;charset=UTF-8",
			url: routeBase+'/consulta/consultar_diagnosticos',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Selecciona un diagnóstico'
		},
		//log: 3,
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].dec10,
						value: data[i].id,
						data: {
							subtext: data[i].clave,
						}
					}));
				}
			}					
			return array;
		}
	};

	

	var cargarMunicipios = function(idEstado = 0, idSelect = null, divSend = null){            
		//routeConsulta variable global en layoute plantilla.            
		$.getJSON(routeBase+'/consulta/municipios/'+idEstado)
		.done(function(data){
			
			/*$('#div_responsable_municipio').remove();
			campos = estilo_modal.select(idCampo = 'responsable_municipio', nameCampo = 'Municipio:', newClass = '', divSize, datos = '');
			$('#responsable_estado').after(campos);*/

			optionSelect = '<option>[SELECCIONE UNA OPCION]</option>';                
			$.each(data, function(key, value){                                        
				optionSelect = optionSelect+'<option ';
				if (idSelect == value.clave) { optionSelect = optionSelect+' selected'; }
				optionSelect = optionSelect+' value='+value.clave+'>'+value.descripcion+'</option>';                    
			});
			$(divSend).empty();
			$(divSend).append(optionSelect);
			$(divSend).selectpicker(optionSelect);
		})
	}

	var cargarLocalidades = function(idMunicipio = 0, idSelect = null, divSend = null){            
		//routeConsulta variable global en layoute plantilla.
		$.getJSON(routeBase+'/consulta/asentamientos/'+idMunicipio)
		.done(function(data){                       
			optionSelect = '<option>[SELECCIONE UNA OPCION]</option>';              
			$.each(data, function(key, value){						
				optionSelect = optionSelect+'<option ';
				if (idSelect == value.clave) { optionSelect = optionSelect+' selected'; }
				optionSelect = optionSelect+' value='+value.clave+'>'+value.descripcion+'</option>';
			});					
			$(divSend).empty();
			$(divSend).append(optionSelect);
			$(divSend).selectpicker(optionSelect);
		})
	}

	var cargarCodigoPostal = function(idAsentamiento = null, divSend = null){
		$.getJSON(routeBase+'/consulta/codigo_postal/'+idAsentamiento)
		.done(function(data){                
			$(divSend).val(data.codigo);
		})
	}

	var cargarEscuelas = function(idEstado = null, idMunicipio = 0, idNivelEducativo = 0, idSelect = null, divSend = null){
		//routeConsulta variable global en layoute plantilla.		
		$.getJSON(routeBase+'/consulta/escuelas',{idEstado: idEstado, idMunicipio:idMunicipio, idNivelEducativo: idNivelEducativo})
		.done(function(data){
			optionSelect = '<option>[SELECCIONE UNA OPCION]</option>';              
			$.each(data, function(key, value){						
				optionSelect = optionSelect+'<option ';
				if (idSelect == value.clave) { optionSelect = optionSelect+' selected'; }
				optionSelect = optionSelect+' value='+value.clave+'>'+value.descripcion+'</option>';
			});					
			$(divSend).empty();
			$(divSend).append(optionSelect);
			$(divSend).selectpicker(optionSelect);
		})
	}

	var cargarNivelesEducativos = function(idEstado = null, idMunicipio = 0, idSelect = null, divSend = null){		
		$.getJSON(routeBase+'/consulta/escuelas/niveles_educativos',{idEstado: idEstado, idMunicipio:idMunicipio})
		.done(function(data){
			console.log(data);
			optionSelect = '<option>[SELECCIONE UNA OPCION]</option>';              
			$.each(data, function(key, value){						
				optionSelect = optionSelect+'<option ';
				if (idSelect == value.clave) { optionSelect = optionSelect+' selected'; }
				optionSelect = optionSelect+' value='+value.clave+'>'+value.descripcion+'</option>';
			});					
			$(divSend).empty();
			$(divSend).append(optionSelect);
			$(divSend).selectpicker(optionSelect);
		})
	}



/*	var optionsEmpleado = {
		ajax: {
			url: pathCae+'catalogo/buscar_empleados',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			}
		},
		locale: {
			emptyTitle: 'Seleccione un empleado'
		},

		//log: 3,
		preprocessData: function (data) {
			console.log(data);
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nombre,
						value: data[i].id,
						data: {
							subtext: data[i].depto
						}
					}));
				}
			}
			return array;
		}
	};	


	var optionsMedico = {
		ajax: {
			url: pathCae+'catalogo/buscar_medico',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Seleccione un médico'
		},
		//log: 3,
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nombre,
						value: data[i].id,
						data: {
							subtext: data[i].matricula
						}
					}));
				}
			}
			//console.log(array);
			return array;
		}
	};
	
	var optionsDepartamento = {
		ajax: {
			url: pathCae+'catalogo/buscar_departamento',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			}
		},
		locale: {
			emptyTitle: 'Seleccciona'
		},
		//log: 3,
		preprocessData: function (data) {
			console.log(data);
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].descripcion,
						value: data[i].id_departamento,
						data: {
							subtext: data[i].codigo
						}
					}));
				}
			}
			return array;
		}
	};

	var optionsExtension = {
		ajax: {
			url: pathCae+'catalogo/buscar_extension',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Seleccione una extensión'
		},
		//log: 3,
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nombre,
						value: data[i].id,
					}));
				}
			}					
			return array;
		}
	};	
			
	var optionsReligiones = {
		ajax: {
			url: pathCae+'catalogo/buscar_religion',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Seleccione una religión'					
		},
		//log: 3,
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].descripcion,
						value: data[i].id_religion,			
					}));
				}
			}
			//console.log(array);
			return array;
		},
		preserveSelected: true
	};

	var optionsDerechoHabiencia = {
		ajax: {
			url: pathCae+'catalogo/buscar_derecho_habiencia',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Seleccione una institución'
		},				
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].institucion,
						value: data[i].id_derecho_habiencia,			
					}));
				}
			}
			//console.log(array);
			return array;
		},
		preserveSelected: true
	};

	var optionsNacionalidades = {
		ajax: {
			url: pathCae+'catalogo/buscar_nacionalidad',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);
			}
		},
		locale: {
			emptyTitle: 'Seleccione una nacionalidad'
		},				
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nacionalidad,
						value: data[i].id_nacionalidad,
					}));
				}
			}
			//console.log(array);
			return array;
		},
		preserveSelected: true
	};

	var optionsArea = {
		ajax: {
			url: pathCae+'catalogo/buscar_area',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},          
		},
		locale: {
			emptyTitle: 'Seleccione un área'          
		},
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nombre,
						value: data[i].id_area,
						data: {
							subtext: data[i].id_area
						}               
					}));
				}
			}
			return array;
		}
	};

	var optionServicio = {
		ajax: {
			url: pathCae+'catalogo/buscar_servicio',
			type: 'POST',
			dataType: 'json',
			data: {
				q: '{{{q}}}'
			},
			success: function(data, config) {
			//console.log(data);					
			}
		},
		locale: {
			emptyTitle: 'Seleccione un servicio'
		},
		//log: 3,
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for(i = 0; i < l; i++){
					array.push($.extend(true, data[i], {
						text: data[i].nombre,
						value: data[i].id_servicio,
						data: {
							subtext: data[i].id_servicio
						}								
					}));
				}
			}
			//console.log(array);
			return array;
		}
	};	

	// Codigo para mostrar los municipios y localidades que pertenecen a un estado.
	var conf_ubicacion = function (tag_municipio, tag_localidad, tag_localidad_id) {
		var options = {
			ajax: {
				url: pathCae+'catalogo/get_estados_json/',
				timeout: 300,
				displayField: "nombre",
				valueField: "id",
				triggerLength: 1,
				method: "get",
				loadingClass: "loading-circle"
			},
			onSelect: function (item_estado){
				//console.log("Estado: "+item_estado.value);
				var id_estado = item_estado.value;

				$(tag_municipio).val("");
				$(tag_localidad).val("");
				$(tag_localidad).attr('disabled', 'disabled');
				$(tag_municipio).removeAttr("disabled");
				$(tag_municipio).typeahead('destroy');
				$(tag_municipio).typeahead({
					ajax: {
						url: pathCae+'catalogo/get_municipios_json/'+id_estado,
						timeout: 300,
						displayField: "nombre",
						valueField: "id",
						triggerLength: 1,
						method: "get",
						loadingClass: "loading-circle"
					},
					onSelect: function(item_municipio){
						//console.log("Municipio: "+item_municipio.value);
						//console.log(tag_localidad);

						var id_municipio = item_municipio.value;

						$(tag_localidad).val("");
						$(tag_localidad).removeAttr("disabled");
						$(tag_localidad).typeahead('destroy');
						$(tag_localidad).typeahead({
							ajax: {
								url: pathCae+'catalogo/get_localidades_json/'+id_municipio,
								timeout: 300,
								displayField: "nombre",
								valueField: "id",
								triggerLength: 1,
								method: "get",
								loadingClass: "loading-circle"
							},
							preDispatch: function (query) {
								showLoadingMask(true);
								return {
									search: query
								}
							},
							preProcess: function (data) {
								showLoadingMask(false);
								if (data.success === false) {
									// Hide the list, there was some error
									return false;
								}
								// We good!
								return data.mylist;
							},
							onSelect: function(item_localidad){
								//console.log(item_localidad);
								$(tag_localidad_id).val(item_localidad.value);
							}
						});
					}
				});

			}
		}
		//console.log(options);
		return options;
	};

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}	*/