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
    checks = document.getElementsByClassName("checkPoliza");
    for (var i = 0; i < checks.length; i++) {
        checks[i].addEventListener("click",function(){
            for(var x = 0; x < checks.length; x++){
                checks[x].setAttribute("checked", "false");
            }
            checks[i].setAttribute("checked", "true");
        });
    }
});