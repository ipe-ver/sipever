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
        <h2 style="text-align:right;">MISIÓN - VISIÓN - FILOSOFÍA</h2>
        <br>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active" style="font-size:20px;"><a href="#tab_1" data-toggle="tab"><b>Misión</b></a></li>
                <li style="font-size:20px;"><a href="#tab_2" data-toggle="tab"><b>Visión</b></a></li>
                <li style="font-size:20px;"><a href="#tab_3" data-toggle="tab"><b>Filosofía</b></a></li>
                <li style="font-size:20px;"><a href="#tab_4" data-toggle="tab"><b>Ética</b></a></li>
                
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">

                <!-- TAB DE MISIÓN  --> 

                <div class="tab-pane active" id="tab_1">
                    <br>  
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;">Ser un Instituto Veracruzano que garantice el cumplimiento del derecho humano a la seguridad social como pensiones y jubilaciones, 
                        entre otras prestaciones.</p>
                </div>

                <!-- TAB DE VISIÓN  --> 

                <div class="tab-pane" id="tab_2">
                    <br>  
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;">Ser un Instituto que administre sus recursos humanos, materiales y financieros eficientemente para tener solvencia económica garantizando 
                        en el largo plazo las pensiones y para ofrecer los servicios y prestaciones con calidad; contribuyendo al sano desarrollo de las políticas 
                        públicas del Gobierno del Estado.</p>
                </div>
                
                <!-- TAB DE FILOSOFÍA  --> 

                <div class="tab-pane" id="tab_3">
                    <br>
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;"><i class="fa fa-asterisk"></i> Sentido Humano- Ser conscientes de nuestra labor, poner al servicio de los derechohabientes y de nuestros compañeros 
                    trabajadores nuestro talento personal y excelencia profesional.

                    <br>
                    <br>
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;"> <i class="fa fa-asterisk"></i> Integridad- Preservar la coherencia, congruencia, unidad y entereza entre el pensar, el decir y el hacer.</p>

                    <br>
                    <br>
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;"> <i class="fa fa-asterisk"></i> Transparencia- Ofrecer información pertinente, oportuna, verificable, actualizada y accesible a la población en general, referente 
                        al instituto de acuerdo a la normatividad correspondiente.</p>
                </div>

                <!-- TAB DE ÉTICA  --> 

                <div class="tab-pane" id="tab_4">
                    <br>  
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;">El pasado 12 de septiembre del 2013 se publicó en la Gaceta Oficial del Estado, Núm. Ext. 358, el Decreto por el que se establece el Código de
                        Ética de los Servidores Públicos del Poder Ejecutivo del Estado de Veracruz, el cual es de observancia general y obligatoria y tiene por 
                        objeto enunciar y dar a conocer los valores y principios de carácter ético que deben observar y cumplir los servidores públicos en su empleo,
                        cargo o comisión.</p>
                    <br>
                    <br>      
                    <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;">Valores y Principios Éticos que deben observar y bajo los cuales deben conducirse los servidores públicos de la administración pública estatal.</p>           
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-1">
</div>

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection

