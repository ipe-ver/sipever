@extends('adminlte::layouts.landing')

@section('style')

{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}

<style>  
  
</style>

@endsection

@section('content')
 
<div class="row">
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
    <div class="col-md-10">

    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center; font-size:38px; background-color: #948C75;"><strong>Bienvenido</strong></div>
                <div class="panel-body">

                    <div class="box box-widget widget-user-2" style="background-color: #F3EFE0;">
                       
                            <!-- Opciones de cambiar contraseña -->
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i> Opciones <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" id="btnEditPassword"><i class="fas fa-caret-right"></i> Cambiar contraseña</a>
                                </li>
                            </ul>
                        </div>
                   
                        <!--CABECERA -->
                        <div class="widget-user-header bg-default">
                            <div class="widget-user-image">
                                {{ HTML::image('components/admin-lte/dist/img/avatar5.png', 'User Avatar', array('class' => 'img-circle')) }}
                            </div>
                            <h1 class="widget-user-username" style="font-size:28px;">
                                 {{Auth::user()->empleados->nombre}} {{Auth::user()->empleados->apellido_materno}} {{Auth::user()->empleados->apellido_paterno}}  
                                
                            </h1>
                            <h5 class="widget-user-desc" style="font-size:20px;">
                                @if(Auth::user()->hasRole('admin'))
                                    <div>Acceso como Administrador</div>
                                
                                @elseif(Auth::user()->hasRole('almacen_admin')) 
                                    <div>Acceso como Administrador de Almacén</div>

                                @elseif(Auth::user()->hasRole('almacen_capturista')) 
                                    <div>Acceso como Capturista de Almacén</div>    
                                    
                                @else(Auth::user()->hasRole('almacen_oficinista')) 
                                    <div>Acceso como Oficinista de Almacén</div>
                                
                                @endif
                            </h5>
                        </div><!-- /. widget-user-header bg-yellow -->
                    </div>  <!-- ./ box box-widget widget-user-2-->  
                </div> <!-- ./ panel-body-->  

            </div> <!-- ./ panel-default-->  
        </div><!-- ./ panel panel -default-->  
  
    </div> <!-- ./ col-md-10 -->
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
</div> <!-- ./ row -->

@include('adminlte::layouts.partials.modal_gral')

@endsection



@section('script')
<script>
    $(function (){
        var user = @json($user);
       // console.log(user);

        var tituloModal = $('#modal-titulo');
		var bodyModal = $('.modal-body');
		var footerModal = $('.modal-footer');
		var modal = $('#modal');
		

		var limpiarModal = function(){
			tituloModal.empty()
			bodyModal.empty()
			footerModal.empty()
		}
        
        $('#btnEditPassword').click(function(e){
            e.preventDefault();
            limpiarModal();
            tituloModal.append('<i class="fa fa-plus"></i> Cambiar contraseña');


            let dataCampos1 = [
                {campo:'input',idCampo:'id_user',nameCampo:'',typeCampo:'hidden',valorCampo: user.id, placeholder:'',newClass:'',divSize:'12',datos: ''},
                {campo:'input',idCampo:'current_password',nameCampo:'Contraseña actual:',typeCampo:'password',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: ''},
                {campo:'input',idCampo:'password',nameCampo:'Nueva Contraseña:',typeCampo:'password',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: ''},    
            ];

            bodyModal.append(estilo_modal.mostrar(dataCampos1));

            footerModal.append(imprimirBoton('btn-success', 'btnUpdatePassword', 'Guardar'));

            modal.modal('show');
        })

        footerModal.on('click', '#btnUpdatePassword', function(){
				
                var dataString = {
                    id_user: $("#id_user").val(),
					current_password: $("#current_password").val(),
					password: $("#password").val(),
				}
				console.log(dataString);				
				$.ajax({
					type: 'POST',
					url: routeBase+'/catalogos/usuario/cambiar_password',
					data: dataString,
					dataType: 'json',
					success: function(data) {				
                        modal.modal('hide');
                        messageToastr(data.tipo, data.mensaje);
                        //table.bootstrapTable('refresh');
																
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
						footerModal.append(imprimirBoton('btn-success', 'btnUpdatePassword', 'Guardar'));
					}
				});
			})

    })
</script>

@endsection







