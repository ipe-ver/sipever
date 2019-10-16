var close = document.getElementsByClassName("closebtn");
var i;
/*
 * Con esta función se carga el funcionamiento de las notificaciones
*/
for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        //Despues de 600 milisegundos despues de activar el boton de cierre la notificacion desaparecerá
        setTimeout(function(){ div.style.display = "none"; }, 600);
        //Despues de 1 segundo la notificaicon desaparecerá del html
        setTimeout(function(){
            var alertContainer=document.getElementById("contenedor-alert");
            if(alertContainer!=null){
                alertContainer.remove();
            }
        }, 1000);
    }
}

window.addEventListener("load", function(){
    checks = document.getElementsByClassName("checkReporte");
    for (var i = 0; i < checks.length; i++) {
        checks[i].addEventListener("click",function(event){
            seleccionarReporte(event.srcElement);
        });
    }
});

function seleccionarReporte(checkBox){
    var boxes = document.getElementsByClassName("checkReporte");
    for (var i = 0; i < boxes.length; i++) {
        if(boxes[i].id != checkBox.id){
            if(boxes[i].checked){
                boxes[i].checked =  !boxes[i].checked;
            }
        }
    }
}