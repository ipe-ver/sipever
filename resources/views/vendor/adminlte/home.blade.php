@extends('adminlte::layouts.landing')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>
                <div class="panel-body">
                    @if(Auth::user()->hasRole('admin'))
                        <div  class="alert alert-success" >Acceso como Administrador</div>
                       
                       
                      
                    @elseif(Auth::user()->hasRole('user')) 
                        <div  class="alert alert-success" >Acceso como Usuario</div>
                        
                       

                    @else(Auth::user()->hasRole('almacen_admin')) 
                        <div  class="alert alert-success" >Acceso como Administrador de Almacén</div>
                       
                      

                    @endif
                    Has iniciado sesión!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




