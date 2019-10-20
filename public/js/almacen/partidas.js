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

// Con las siguientes funciones se asignan los ids correspondientes para cada elemento dentro de los paneles de artículos.
// Se asigna el id al panel
var paneles = document.getElementsByClassName('panel-menu');
for (var i = paneles.length - 1; i >= 0; i--) {
    paneles[i].setAttribute("id", "Partida"+i);
    var campos = paneles[i].getElementsByClassName('panel-body')[0].getElementsByTagName("input");
    for (var index = campos.length-1; index >= 0; index--) {
        campos[index].setAttribute("id", campos[index].id+i);
    }
    var listas = paneles[i].getElementsByClassName('panel-body')[0].getElementsByTagName("select");
    for(var index = listas.length-1; index >=0; index--){
        listas[index].setAttribute("id", listas[index].id+i);
    }
 }


//Se asignan los ids a los botones de edición y eliminación.
var btn_editar=document.getElementsByClassName("btn-edit");
for (var i = 0; i < btn_editar.length; i++) {
    btn_editar[i].setAttribute("id", btn_editar[i].id+i);
    btn_editar[i].setAttribute("disabled", "true");
}

var btn_eliminar=document.getElementsByClassName("btn-delete");
for (var i = 0; i < btn_eliminar.length; i++) {
    btn_eliminar[i].setAttribute("id", btn_eliminar[i].id+i);
    btn_eliminar[i].setAttribute("disabled", "true");
    btn_eliminar[i].setAttribute("data-target", "#eliminarPartida"+i);
}

var modales = document.getElementsByClassName("modal-eliminar");
for (var i = 0; i < modales.length; i++) {
    modales[i].setAttribute("id", modales[i].id+i);
}

//Se asignan los ids y métodos para los botones de cada panel que no pertenecen al form de artículo.
var paneles = document.getElementsByClassName("panel-collapse");
if(paneles!=null){
    for (let x = 0; x < paneles.length; x++) {
        const panel = paneles[x];
        panel.setAttribute("id", "collapsePartida"+x);
    }
    var botones = document.getElementsByClassName("btn-left");
    var contadores = new Array(botones.length);
    for (var i = 0; i < contadores.length; i++) {
        contadores[i]=0;
    }
    for (let index = 0; index < botones.length; index++) {
        const boton = botones[index];
        /*Las siguientes tres funciones asignan los ids de los paneles que se van a desplegar al dar click
         * sobre el boton de despliegue que esta dentro del encabezado del panel.
         */
        boton.setAttribute("id", "verPartida"+index);
        boton.setAttribute("data-target", "#collapsePartida"+index);
        boton.setAttribute("aria-controls", "collapsePartida"+index);

        //Cada vez que se le de click al botón de despliegue...
        boton.addEventListener('click', function(){
            contadores[index]+=1;
            var panel_target=document.getElementById("collapsePartida"+index);
            setTimeout(function(){
                if(panel_target.classList.contains("show")&&contadores[index]%2==0){
                    panel_target.setAttribute("class", "collapse panel-collapse");
                }
            },385);
            var btn_editar_aux = document.getElementById('btn_editar'+index);
            //Se agrega el metodo click al boton
            btn_editar_aux.addEventListener("click",function(){
                var panel_aux = document.getElementById("Partida"+index);
                var campos_aux = panel_aux.getElementsByClassName('panel-body')[0].getElementsByTagName("input");
                for (var x = 0; x < campos_aux.length; x++) {
                    if(campos_aux[x].hasAttribute("disabled")){
                        campos_aux[x].removeAttribute("disabled");
                    }else{
                        campos_aux[x].setAttribute("disabled", "true");
                    }
                }
                var botones_aux = panel_aux.getElementsByClassName('panel-body')[0].getElementsByTagName("button");
                for (var x = 0; x < botones_aux.length; x++) {
                    if(botones_aux[x].hasAttribute("disabled")){
                        botones_aux[x].removeAttribute("disabled");
                    }else{
                        botones_aux[x].setAttribute("disabled", "true");
                    }
                }
            });
            // Se habilitan los botones de edición y el de eliminación
            if(btn_editar_aux.hasAttribute("disabled")){
                btn_editar_aux.removeAttribute("disabled");
            }else{
                btn_editar_aux.setAttribute('disabled', 'true');
            }
            var btn_eliminar_aux = document.getElementById('btn_eliminar'+index);
             if(btn_eliminar_aux.hasAttribute("disabled")){
                btn_eliminar_aux.removeAttribute("disabled");
            }else{
                btn_eliminar_aux.setAttribute('disabled', 'true');
            }
        });
    }
}