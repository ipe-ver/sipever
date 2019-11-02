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
	var panel_padre = getParent(tablas[id_aux],4);
	for(var i = 0, length1 = tablas.length; i < length1; i++){
    	var hijo_aux =tablas[i].children[1].lastElementChild;
		while (hijo_aux) {
			tablas[i].children[1].removeChild(hijo_aux);
			hijo_aux =tablas[i].children[1].lastElementChild;
		}
    }
	cerrarPaneles(panel_padre);
    var tabla_padre = tablas[id_aux];
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
		        error: function(){
		        	var message = document.getElementById("messageCol");
	                var mensaje = document.createElement("div");
	                mensaje.setAttribute("class", "alert-container");
	                mensaje.setAttribute("id", "contenedor-alert");
	                var alert = document.createElement("div");
	                alert.setAttribute("class", "alert error");
	                var closebtn = document.createElement("span");
	                closebtn.setAttribute("class","closebtn");
	                closebtn.innerHTML="&times;";
	                var info=document.createElement("p");
	                info.innerHTML='Error al tratar de conectar con el servidor,' +
	                	'\nPorfavor contacte al edpartamento de tecnologías de la información';
	                alert.appendChild(closebtn);
	                alert.appendChild(info);
	                mensaje.appendChild(alert);
	                message.appendChild(mensaje);
	                cargarMetodo();
	                panel_padre.setAttribute("deployed", "true");
	                $("#loader").hide();
		        },
		        success: function(datos){
		            var contador = 0;
		            datos.articulos.forEach(function(element){
		            	var td = document.createElement("tr");
		            	td.setAttribute("name", `detalle${contador}`);
		            	for(var i = 0, length1 = element.length; i < length1; i++){
		            		var tr = document.createElement("td");
		            		tr.setAttribute("id", `detalle${contador}_${i}`);
		            		tr.innerHTML=element[i];
		            		td.appendChild(tr);
		            	}
		            	contador++;
		            	tabla_padre.children[1].appendChild(td);
		            });
		            panel_padre.setAttribute("deployed", "true");
		            $("#loader").hide();
		        },
		        timeout: 5000
		    });
		}else{
			var hijo =tabla_padre.children[1].lastElementChild;
			while (hijo) {
				tabla_padre.children[1].removeChild(hijo);
				hijo =tabla_padre.children[1].lastElementChild;
			}
			panel_padre.removeAttribute("deployed");
		}
	}
}

function cerrarPaneles(panelExclude){
	var paneles = document.getElementsByClassName("panel-collapse")
	for(var i = 0, length1 = paneles.length; i < length1; i++){
		if(panelExclude.id != paneles[i].id){
			paneles[i].removeAttribute("deployed");
		}
	}
}