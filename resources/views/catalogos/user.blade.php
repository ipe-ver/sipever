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

		 
		/*****************************************************************************************
				DECLARAR VARIABLES
		*****************************************************************************************/

		var tituloModal = $('#modal-titulo');
		var bodyModal = $('.modal-body');
		var footerModal = $('.modal-footer');
		var modal = $('#modal');
		var table 	  = $('#table');
		
       
		var limpiarModal = function(){
				tituloModal.empty()
				bodyModal.empty()
				footerModal.empty()
		}	
		
		
		/*****************************************************************************************
				FUNCION PARA CREAR FORMULARIO DE LA INCIDENCIA
		*****************************************************************************************/

        $('#btnAgregar').click(function(e){

        		e.preventDefault();
				limpiarModal();

			tituloModal.append('<i class="fa fa-plus"></i> Agregar Usuario');

        

         campos1 = estilo_modal.mostrar([
            {campo:'input',idCampo:'name', nameCampo:'Nombre:', typeCampo:'text',valorCampo: '', placeholder:'Usuario',newClass:'',divSize:'4',datos:''},
        	{campo:'input',idCampo:'username', nameCampo:'Usuario:', typeCampo:'text',valorCampo: '', placeholder:'Usuario',newClass:'',divSize:'4',datos:''},
			{campo:'input',idCampo:'email', nameCampo:'E-mail:', typeCampo:'text',valorCampo: '', placeholder:'E-mail',newClass:'',divSize:'4',datos:''},
			
			
		]);

      
		bodyModal.append(campos1);
			


		footerModal.append(imprimirBoton('btn-success', 'btn-submit-asig', 'Guardar'));
		footerModal.append(imprimirBoton('btn-danger', 'btn-cancelar', 'Cancelar'));
		modal.modal('show');

		})


		


		/*****************************************************************************************
				FUNCION PARA CREAR EL BOTON DE GUARDAR  LA INCIDENCIA
		*****************************************************************************************/

		$('.modal-footer').on('click', '#btn-submit-asig', function(){
				footerModal.empty();
				footerModal.append(imprimirBoton('btn-success btn-lg center-block', 'btnGuardar', '<i class="fa fa-spinner fa-spin"></i> Procesando orden', 'disabled'));
		
			
			var dataString = {
				name: $("#name").val(),	
				username: $("#username").val(),
				email: $("#email").val(),	
				

				
			}

			//console.log(dataString);

			$.ajax({
				type: 'POST',
				url: routeBase+'/recursos_fisicos/equipos/kardex',
				data: dataString,
				dataType: 'json',
				success: function(data) {						
							messageToastr('success', data.message);							
				           	modal.modal('hide');
				           	table.bootstrapTable('refresh');								
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
						footerModal.empty();
						footerModal.append(imprimirBoton('btn-success', 'btn-submit-asig', 'Guardar'));
						footerModal.append(imprimirBoton('btn-danger', 'btn-cancelar', 'Cancelar'));
				}
			});

		})	// FIN DE LA FUNCION DE BOTON DE GUARDAR LA INCIDENCIA

		
		/**********************************************************************************************
			FUNCION PARA NO MOSTRAR Y REFRESCAR LA TABLA DE INCIDENCIAS CON EL BOTON DE CANCELAR
		***********************************************************************************************/


		$('.modal-footer').on('click', '#btn-cancelar', function(){
				modal.modal('hide');
				table.bootstrapTable('refresh');

			})			
			
		/**********************************************************************************************
			FUNCION PARA NO MOSTRAR Y REFRESCAR LA TABLA DE INCIDENCIAS CON EL BOTON DE CANCELAR
		***********************************************************************************************/
			


		var formatTable = function(value, row, index) {	
		
						
				btn = '<button class="btn btn-info btn-xs" id="editar" ><i class="fa fa-edit"></i>&nbsp;Editar</button>';
				btn = btn+'&nbsp;&nbsp;';
				btn = btn+'<button class="btn btn-danger btn-xs" id="eliminar"><i class="fa fa-"></i>&nbsp;Eliminar</button>';
				return [btn].join('');
			
			
		}
		

			window.operateEvents = {
				
				'click #editar': function (e, value, row, index) {
					//location.href = routeBase+'/recursos_fisicos/kardex/edit/'+row.id;					
				},
				'click #eliminar': function (e, value, row, index) {
					//eliminar(row);						
					
				},
			}	

			//FUNCION PARA HABILITAR FILA
			/*function eliminar(row) {
				
				
				var id = row.id;
				

				$.ajax({
					url: routeBase+'/recursos_fisicos/kardex/destroy/'+row.id,
					type: 'delete',
					data: {'id': id}
				})
				.done(function(datos) {
					table.bootstrapTable('refresh', {url: routeBase+'/recursos_fisicos/kardex/incidencia/'+id_equipo}); 
				});	
			};*/
			
			table.bootstrapTable({
				locale: 'es-MX',
				pagination: true,
				exportTypes: ['txt', 'excel', 'doc', 'pdf', 'powerpoint'],
				filterControl: true, 
				pageList: [5, 10, 25, 50],
				pageSize: 500,
				search: true,
				searchable: true, 
				smartDisplay: true,
				showColumns: true,
				showExport: true,
				showRefresh: true,
				showFooter:false,
				searchFormatter: true,
                url: routeBase+'/recursos_fisicos/kardex/incidencia/'+id_equipo,						
				columns: [{	
						sortable: true,					
						field: 'id',
						title: 'ID.',
					}, {	
						sortable: true,					
						field: 'name',
						title: 'Nombre',
						//filterControl: 'input',	
					}, {
						sortable: true,						
						field: 'username',
						title: 'Username',
						//filterControl: 'input',	
					}, {
						sortable: true,						
						field: 'email',
						title: 'E-mail',
						//filterControl: 'input',	
					}, 	{					
						title: 'Acciones',
						formatter: formatTable,
						events: operateEvents
					}]				
				})
	
		}); // FIN DE LA FUNCION JAVASCRIPT
	</script>	

	
@endsection
