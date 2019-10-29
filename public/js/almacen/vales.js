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
	var paneles = document.getElementsByClassName("panel-collapse");
	for (let x = 0; x < paneles.length; x++) {
        const panel = paneles[x];
        panel.setAttribute("id", "collapseVale"+x);
    }
    var botones = document.getElementsByClassName("btn-left");
    // Se genera un array de contadores para llevar el control de las veces que se da click en cada boton
    var contadores = new Array(botones.length);
    // Se inicializan los contadores en 0
    for (var i = 0; i < contadores.length; i++) {
        contadores[i]=0;
    }
    for (let index = 0; index < botones.length; index++) {
        const boton = botones[index];
        /*Las siguientes tres funciones asignan los ids de los paneles que se van a desplegar al dar click
         * sobre el boton de despliegue que esta dentro del encabezado del panel.
         */
        boton.setAttribute("id", "verVale"+index);
        boton.setAttribute("data-target", "#collapseVale"+index);
        //Cada vez que se le de click al botón de despliegue...
        boton.addEventListener('click', function(){
            //Se suma en uno el contador cada vez que se da click
            contadores[index]+=1;
            //Se obtiene el panel para colapsar
            var panel_target=document.getElementById("collapseVale"+index);
            //Después de 384 milisegundos el panel se colapsará.
            setTimeout(function(){
                //Solo se accederá a la función si el panel está desplegado y el contador es para
                // Asegurando así que unicamente cuando el panel esté desplegado se acceda a la función.
                if(panel_target.classList.contains("show")&&contadores[index]%2==0){
                    panel_target.setAttribute("class", "collapse panel-collapse");
                }
            },385);
        });
    }
});
