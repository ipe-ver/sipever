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
        
        <br>
        
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            
            <div class="tab-content">
            <h2 style="text-align:right;">INFORMACIÓN INSTITUCIONAL</h2>
                <br> 
                <p style="font-size:18px; text-align: justify; font-family: arial; line-height: 200%;">La Información Institucional es la esencia numérica del Instituto, en ésta se exponen los asuntos más relevantes, de tal modo que
                 encontrará Estadísticas, Finanzas, Prestaciones Institucionales, Estancias que prestan servicios y Población Derecho-habiente, así 
                 como Organismos y Municipios incorporados al Instituto. </p>
            </div>
            <br>
            
        </div>
        <br>
        <!-- PRIMER RENGLON -->
        <div class="row">
            <!-- PRIMER BOTON -->
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #C71585;"><i class="fa fa-university"></i></span>
                    <div class="info-box-content">
                        
                        <span class="info-box-text" style="font-size:18px;"><strong>Organismos</strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>Incorporados</strong></span>
                    </div>
                    
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>
           
        

            <!-- SEGUNDO BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #DEB887;"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        
                        <span class="info-box-text" style="font-size:18px;"><strong>Población </strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>Derechohabiente</strong></span>
                        
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>

             <!-- TERCER BOTON -->
             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #DAA520;" ><i class="fa fa-cog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:14px;"><strong>Presupuesto Anual y</strong></span>
                        <span class="info-box-text" style="font-size:14px;"><strong>Ejercido de Prestaciones</strong></span>
                        <span class="info-box-text" style="font-size:14px;"><strong> Institucionales</strong></span>
                        <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                    </div>
                    
                </div>
            </div>

            <!-- CUARTO BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #808000;" ><i class="fa fa-calculator"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:18px;"><strong>Nómina de </strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>Pensionados</strong></span>
                        
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <!-- SEGUNDO RENGLON -->
        <div class="row">
            <!-- PRIMER BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #E9967A;"><i class="fa fa-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:16px;"><strong>Ingresos por Cuotas</strong></span>
                        <span class="info-box-text" style="font-size:16px;"><strong>y Aportaciones</strong></span>
                     
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>
        

            <!-- SEGUNDO BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #FF8C00;"><i class="fa fa-balance-scale"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:18px;"><strong>Altas y Bajas </strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>de Pensionados</strong></span>
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>

             <!-- TERCER BOTON -->
             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #BC8F8F;"><i class="fa fa-stethoscope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:18px;"><strong>Seguro de Salud</strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>para la familia</strong></span>
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>

            <!-- CUARTO BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #A52A2A;"><i class="fa fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:18px;"><strong>Acuerdos de H. </strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>Consejo Directivo</strong></span>
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <!-- TERCER RENGLON -->
           <div class="row">
            <!-- PRIMER BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #008B8B;"><i class="fa fa-folder"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:16px;"><strong>Préstamos a C y M</strong></span>
                        <span class="info-box-text" style="font-size:16px;"><strong>Plazo Domiciliados</strong></span>
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>
        

            <!-- SEGUNDO BOTON -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color: #9966CC;"><i class="fa fa-expand"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:18px;"><strong>Incrementos a  </strong></span>
                        <span class="info-box-text" style="font-size:18px;"><strong>Pensionados</strong></span>
                    </div>
                    <a href="" class="btn btn-danger btn-xs pull-right">
						Ver más...
						<i class="fa fa-arrow-circle-right"></i>
					</a>
                </div>
            </div>
    </div>

    


<div class="col-md-1">
</div>



@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection

