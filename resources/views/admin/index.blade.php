@extends('adminlte::layouts.landing')

@section('style')
    {!! Html::style('components/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('components/bootstrap/dist/css/bootstrap.css.map') !!}
	{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}
   
@endsection



@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">			
			<h3 class="box-title pull-right">Catálogos de Configuración</h3>
		</div>
		<div class="box-body">
			
                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                

                                <h3 class="box-title">Usuarios</h3>
                            </div>
                        
                            <div class="box-body">
                                <a type="button" class="btn btn-block btn-danger btn-lg" href="{!! url('/admin/users') !!}">
                                
                                
                                <h2 class="pull-center">Catálogo de Usuarios</h2>
                                    
                                
                                </a>

                            </div>
                    
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                

                                <h3 class="box-title">Roles</h3>
                            </div>
                        
                            <div class="box-body">
                            <a type="button" class="btn btn-block btn-success btn-lg" href="{!! url('/admin/roles') !!}">
                                <h2 class="pull-center">Catálogo de Roles</h2>
                                </a>
                            </div>
                    
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                

                                <h3 class="box-title">Permisos</h3>
                            </div>
                        
                            <div class="box-body">
                                <a type="button" class="btn btn-block btn-warning btn-lg" href="{!! url('/admin/permissions') !!}">
                                    <h2 class="pull-center">Catálogo de Permisos</h2>
                                </a>
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