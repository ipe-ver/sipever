var close = document.getElementsByClassName("closebtn");
var i;
/*
 * Con esta función se carga el funcionamiento de las notificaciones
*/
 $("#loader").show();
 $(document).ready(function(){
    $("#loader").hide();
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
        paneles[i].setAttribute("id", "Articulo"+i);
        //Se asignan los ids corrspondientes a los elementos del panel
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
    }

    var titulos_panel = document.getElementsByClassName("panel-title");
    for (var i = 0; i < titulos_panel.length; i++) {
         titulos_panel[i].setAttribute("id", "Heading"+i);
     }
    //Se asignan los ids y métodos para los botones de cada panel que no pertenecen al form de artículo.
    var paneles = document.getElementsByClassName("panel-collapse");
    if(paneles!=null){
        for (let x = 0; x < paneles.length; x++) {
            const panel = paneles[x];
            panel.setAttribute("id", "collapseArticulo"+x);
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
            boton.setAttribute("id", "verArticulo"+index);
            boton.setAttribute("data-target", "#collapseArticulo"+index);
            //Cada vez que se le de click al botón de despliegue...
            boton.addEventListener('click', function(){
                var btn_editar_aux = document.getElementById('btn_editar'+index);
                var btn_eliminar_aux = document.getElementById('btn_eliminar'+index);
                cerrarPaneles(btn_editar_aux, btn_eliminar_aux);
                //Se agrega el metodo click al boton
                btn_editar_aux.addEventListener("click",function(){
                    //Se asignan los métodos a los botones de editar y eliminar
                    var panel_aux = document.getElementById("Articulo"+index);
                    var campos_aux = panel_aux.getElementsByClassName('panel-body')[0].getElementsByTagName("input");
                    for (var x = 0; x < campos_aux.length; x++) {
                        if(campos_aux[x].getAttribute("id")!='articuloEstatus'+index && campos_aux[x].getAttribute("id")!='articuloPrecio'+index){
                            if(campos_aux[x].hasAttribute("disabled")){
                                campos_aux[x].removeAttribute("disabled");
                            }else{
                                campos_aux[x].setAttribute("disabled", "true");
                            }
                        }
                    }
                    var select_aux = panel_aux.getElementsByClassName('panel-body')[0].getElementsByTagName("select");
                    for (var x = 0; x < select_aux.length; x++) {
                        if(select_aux[x].hasAttribute("disabled")){
                            select_aux[x].removeAttribute("disabled");
                        }else{
                            select_aux[x].setAttribute("disabled", "true");
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

                if(btn_eliminar_aux.hasAttribute("disabled")){
                    btn_eliminar_aux.removeAttribute("disabled");
                }else{
                    btn_eliminar_aux.setAttribute('disabled', 'true');
                }
            });
        }
    }
});

/**
 * Función para cerrar los demás paneles al abrir uno
 * @param btn_editar, btn_eliminar Recibe como parámetros los botones del panel
 *                                 que accionó el método para deshabilitar todos los demás
 */
function cerrarPaneles(btn_editar, btn_eliminar){
    var botones_edit = document.getElementsByClassName("btn-edit");
    var botones_delete = document.getElementsByClassName("btn-delete");
    for(var i = 0, length1 = botones_edit.length; i < length1; i++){
        if (botones_edit[i].id != btn_editar.id) {
            botones_edit[i].setAttribute("disabled","true");
        }
    }
    for(var i = 0, length1 = botones_delete.length; i < length1; i++){
        if (botones_delete[i].id != btn_eliminar.id) {
            botones_delete[i].setAttribute("disabled","true");
        }
    }
}
