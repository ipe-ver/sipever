window.addEventListener("load", function(){
    cargarMetodo();
    var tablas = document.getElementsByClassName("table");
    for(var i = 0, length1 = tablas.length; i < length1; i++){
    	tablas[i].id = `articulos_factura${i}`;
    }
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
    }

    $('span[id="closeModal"]').click(function(){
        $("#myModal").hide();
    });

    var btns_validar = document.getElementsByClassName("btn-validar");
    for (var i = 0; i < btns_validar.length; i++) {
        btns_validar[i].setAttribute("id", `${btns_validar[i].id}${i}`);
        btns_validar[i].addEventListener("click", function(event){
            event.preventDefault();
            var form = document.getElementById("valeForm");
            if(form.checkValidity()){
                $("#myModal").show();
            }else{
                var message = document.getElementById("messageCol");
                var mensaje = document.createElement("div");
                mensaje.setAttribute("class", "alert-container");
                mensaje.setAttribute("id", "contenedor-alert");
                var alert = document.createElement("div");
                alert.setAttribute("class", "alert warning");
                var closebtn = document.createElement("span");
                closebtn.setAttribute("class","closebtn");
                closebtn.innerHTML="&times;";
                var info=document.createElement("p");
                info.innerHTML="Por favor seleccione si es extemporáneo el vale o no";
                alert.appendChild(closebtn);
                alert.appendChild(info);
                mensaje.appendChild(alert);
                message.appendChild(mensaje);
                cargarMetodo();
            }
        })
    }
    $(document).keyup(function(event){
        if(event.keyCode==27){
            $("#myModal").hide();
        }
    });

});

/**
 * Función para poblar la tabla
 * @param node el nodo del cual viene el evento
 * @param nameNode el nombre del nodo con el cual se obtendrá el id de su padre
 * @param idReference el id de referencia para saber que padre estamos buscando.
 * @return el padre del nodo o en caso contrario null
 */
function getTableRow(node,nameNode){
    var id_aux = parseInt(node.id.split(nameNode)[1]);
    var tablas_aux = document.getElementsByName("detalle");
    return tablas_aux.item(id_aux);
}

function getParent(node, parentNo){
	if(parentNo == 0){
		return node;
	}
	parentNo-=1;
	return getParent(node.parentNode, parentNo);
}

function cargarMetodo(){
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
}

function getDetalles(tipo, folio, button){
	var tablas = document.getElementsByName("detalle");
	var id_aux = parseInt(button.id.split("Vale")[1]);
	var panel_padre = getParent(tablas[id_aux],6);
    var tabla_padre = getParent(tablas[id_aux],2);
	if(tabla_padre){
		if(!panel_padre.hasAttribute("deployed")){
			var token = $('meta[name="csrf-token"]').attr('content');
		    $.ajax({
		        url: "/almacen/vales/getDetalles",
		        type: "POST",
		        dataType: "json",
		        data: {tipo:tipo, folio:folio, _token:token},
		        beforeSend: function(){
		            $("#loader").show();
		        },
		        success: function(datos){
		            $("#loader").hide();
		            var row = getTableRow(tabla_padre,"articulos_factura");
		            console.log(row);
		            datos.articulos.forEach(function(element){
		            	console.log(element);
		            });
		            var clave_art = document.createElement("td");
		            clave_art.innerHTML=datos.clave;
		            panel_padre.setAttribute("deployed", "true");
		        }
		    });
		}else{
			panel_padre.removeAttribute("deployed");
		}
	}
}