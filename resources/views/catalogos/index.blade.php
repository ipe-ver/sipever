@extends('adminlte::layouts.landing')

@section('style')
	
<style>

  .img{
	   width:80px;
  	   height:80px;
    }
</style>	

	
@endsection

@section('content')
<div class="col-md-12">

	<div class="box">
		<div class="box-header">
			 
			 			
			<h3 class="box-title pull-right">Catálogos</h3>

		</div>
		<div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="info-box" style="background: #E8DDCB;">
                        <span class="info-box-icon" style="background: #F77825;"><img class="img" src="{!! url('') !!}/img_download/USERS/usuario.png"/></span>

                        <div class="info-box-content">
                            <a href="{!! url('') !!}/catalogos/users" style="color: #000000;"><h5 style="font-size: 38px;"><strong>Cátalogo de Usuarios</strong></h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box" style="background: #E8DDCB;">
                        <span class="info-box-icon" style="background: #F67280;"><img class="img" src="{!! url('') !!}/img_download/USERS/rol.png"/></span>

                        <div class="info-box-content">
                            <a href="{!! url('') !!}/catalogos/roles"   style="color: #000000;"><h5 style="font-size: 38px;"><strong>Cátalogo de Roles</strong></h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box" style="background: #E8DDCB;">
                        <span class="info-box-icon" style="background: #7AB317;"><img class="img" src="{!! url('') !!}/img_download/USERS/permiso.png"/></span>

                        <div class="info-box-content">
                            <a href="{!! url('') !!}/catalogos/permisos"   style="color: #000000;"><h5 style="font-size: 38px;"><strong>Cátalogo de Permisos</strong></h5></a>
                        </div>
                    </div>
                </div>


            </div>   

            <div class="row">
                <div class="col-md-4">
                    <div class="info-box" style="background: #E8DDCB;">
                        <span class="info-box-icon" style="background: #45ADA8;"><img class="img" src="{!! url('') !!}/img_download/USERS/empleado.png"/></span>

                        <div class="info-box-content">
                            <a href="{!! url('') !!}/catalogos/empleados" style="color: #000000;"><h5 style="font-size: 36px;"><strong>Cátalogo de Empleados</strong></h5></a>
                        </div>
                    </div>
                </div>

            


            </div>     
 		</div>
 	</div>
</div>



@endsection

@section('script')

			

	

	

@endsection

