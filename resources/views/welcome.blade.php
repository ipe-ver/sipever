@extends('adminlte::layouts.landing')


@section('content')
<script src="http://code.jquery.com/jquery-latest.js"></script>
<div class="row">

    <div class="col-md-1"></div>
     
    <div class="col-md-10">
             
        <div class="box box-default">
            <div class="box-header with-border" >
            {{--<img src="{!! url('') !!}/img_system/banner_principal.png" style="width: 800px; height: 100px; display:block; margin:left;"> --}}
                {{--<i class="fa fa-bullhorn"></i>--}}

                {{--<h3 class="box-title">Valores del Mes</h3>--}}
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
                            <img src="{!! url('') !!}/img_system/CARTEL-AGOSTO.jpg" style="width: 800px; height: 400px;"  onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            <div class="carousel-caption" style="color:#641E16;">
                                <h3><strong>CÓDIGO DE CONFIDENCIALIDAD</strong></h3>
                            </div>	
                        </div>
                        <div class="item">
                            <img src="{!! url('') !!}/img_system/CARTEL-VOCACION-JULIO.jpg" style="width: 800px; height: 400px;"  onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
                            <div class="carousel-caption" style="color:#641E16;">
                                <h3><strong>VOCACIÓN DE SERVICIO</strong></h3>
                            </div>	
                        </div>

                        <div class="item">
                            <img src="{!! url('') !!}/img_system/CARTEL-FEBRERO.jpg" style="width: 800px; height: 400px;"  onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
                            <div class="carousel-caption" style="color:#641E16;">
                                <h3><strong>ÉTICA PÚBLICA</strong></h3>
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
                
                    <!-- modal para el ligthbox-->
<div id="infoWeb">
 <div id="myModal" class="modal">
  <span class="close cursor" onclick ="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 3</div>
      <img src="{!! url('') !!}/img_system/CARTEL-AGOSTO.jpg" style="width: 100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 3</div>
      <img src="{!! url('') !!}/img_system/CARTEL-VOCACION-JULIO.jpg" style="width: 100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 3</div>
      <img src="{!! url('') !!}/img_system/CARTEL-FEBRERO.jpg" style="width: 100%">
    </div>
  </div>
  

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="{!! url('') !!}/img_system/CARTEL-AGOSTO.jpg" style="width: 100%" onclick="currentSlide(1)" alt="Código de Confidencialidad">
    </div>
    <div class="column">
      <img class="demo cursor" src="{!! url('') !!}/img_system/CARTEL-VOCACION-JULIO.jpg" style="width: 100%" onclick="currentSlide(2)" alt="Vocación de servicio">
    </div>
    <div class="column">
      <img class="demo cursor" src="{!! url('') !!}/img_system/CARTEL-FEBRERO.jpg" style="width: 100%" onclick="currentSlide(3)" alt="Ética Pública">
    </div>
  </div>
</div>
</div>

            </div>
        </div>
    </div>

    <div class="col-md-1"></div>


</div>

<div class="row">

    <div class="col-md-1"></div>

    <div class="col-md-5">
        <div class="box box-default">
            <div class="box-header with-border">
               

                
            </div>
     
            <div class="box-body">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>Calendario Oficial 2019</h3>

                        <p style="font-size:13px;">Días de descanso obligatorio para los empleados al servicio del poder ejecutivo del Edo. de Veracruz.</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{!! url('') !!}/img_system/calendario_oficial_2019.pdf" class="small-box-footer" target="_blank">Descargar <i class="fa fa-download"></i></a>
                </div>
            </div>
   
        </div>
    </div>

    <div class="col-md-5">
        <div class="box box-default">
            <div class="box-header with-border">
                

                
            </div>
     
            <div class="box-body">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Calendario de Nómina 2019</h3>
                        <h3></h3>

                        <p style="font-size:13px;">Entrega de oficios para justificar días para bono de puntualidad del personal activo.</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{!! url('') !!}/img_system/calendario_nomina_2019.pdf" class="small-box-footer" target="_blank">Descargar <i class="fa fa-download"></i></a>
                </div>
            </div>
   
        </div>
    </div>
     

    <div class="col-md-1"></div>


</div>


<!-- script del lightbox-->
<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<script>
$(document).ready(function(){
  // Activate Carousel with a specified interval
  $("#myModal").Slides({interval: 500, pause: "hover", keyboard:true});
            
  // Enable Carousel Indicators
  $(".mySlides").click(function(){
    $("#myModal").Slides(0);
  });
  $(".mySlides").click(function(){
    $("#myModal").Slides(1);
  });
  $(".mySlides").click(function(){
    $("#myModal").Slides(2);
  });
    
  // Enable Carousel Controls
  $(".prev").click(function(){
    $("#myModal").plusSlides("prev");
  });
  $(".next").click(function(){
    $("#myModal").plusSlides("next");
  });
});
</script>
           
              <script>
// Creamos un evento para que se ejecute cada vez que se pulse una tecla
$(document).keyup(function(e){
    if(e.which==27) {
        $("#infoWeb").hide();
    }
});


</script>
    
           
	
@endsection



     
