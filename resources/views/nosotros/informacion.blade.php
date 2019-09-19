@extends('adminlte::layouts.landing')

@section('style')
	
	{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}
@endsection

@section('content')
 
<div class="col-md-1">
</div>

<!-- TAB DE MISIÓN - VISIÓN  - FILOSOFÍA -->
<div class="row">
    <div class="col-md-10">
        <h2 style="text-align:right;">INFORMACIÓN INSTITUCIONAL</h2>
        <br>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            
            <div class="tab-content">

                <br> 
                <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;">La Información Institucional es la esencia numérica del Instituto, en ésta se exponen los asuntos más relevantes, de tal modo que
                 encontrará Estadísticas, Finanzas, Prestaciones Institucionales, Estancias que prestan servicios y Población Derecho-habiente, así 
                 como Organismos y Municipios incorporados al Instituto. </p>
               
  
            </div>
            <br>
            
            <div class="col-md-3">
                <button type="button" class="btn btn-block btn-primary btn-lg">Organismos Incorporados</button>   
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-block btn-success btn-lg">Población Derechohabiente</button>   
            </div>

            <div class="col-md-4">
                <button type="button" class="btn btn-block btn-warning btn-lg">Presupuesto Anual y Ejercido de Prestaciones Institucionales</button>   
            </div>

            
        </div>
    </div>

    


<div class="col-md-1">
</div>



@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection

