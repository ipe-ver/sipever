@extends('adminlte::layouts.landing')



@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="box box-warning">
            <div class="box-header with-border">
      
                <i class="fa fa-bullhorn"></i>

                <h3 class="box-title">Valores del Mes</h3>
            </div>
      
            <div class="box-body">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{!! url('') !!}/img_system/CARTEL-AGOSTO.jpg" style="width: 800px; height: 450px;">
                            <div class="carousel-caption">
                                <h3 style="color:black;"><strong>CÓDIGO DE CONFIDENCIALIDAD</strong></h3>
                            </div>	
                        </div>
                        <div class="item">
                            <img src="{!! url('') !!}/img_system/CARTEL-VOCACION-JULIO.jpg" style="width: 800px; height: 450px;">
                            <div class="carousel-caption">
                                <h3 style="color:black;"><strong>VOCACIÓN DE SERVICIO</strong></h3>
                            </div>	
                        </div>

                        <div class="item">
                            <img src="{!! url('') !!}/img_system/CARTEL-FEBRERO.jpg" style="width: 800px; height: 450px;">
                            <div class="carousel-caption">
                                <h3 style="color:black;"><strong>ÉTICA PÚBLICA</strong></h3>
                            </div>	
                        </div>
                    </div>

                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>

                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
  <!-- /.col -->

  <div class="col-md-5">
    <div class="box box-warning">
      <div class="box-header with-border">
        <i class="fa fa-bullhorn"></i>

        <h3 class="box-title">Callouts</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        
            <div class="small-box bg-aqua">
                <div class="inner">
                <h3>Noticias!</h3>

                <p>New Orders</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>

          
       
            <div class="small-box bg-green">
            <div class="inner">
             <h3>Citas en Linea</h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        
        
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!-- END ALERTS AND CALLOUTS -->








    
           
	
@endsection



     
