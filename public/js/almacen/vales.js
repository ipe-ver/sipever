$("#loader").show();
$(document).ready(function(){
	$("#loader").hide();
    cargarMetodo();
    var tablas = document.getElementsByClassName("table");
    for(var i = 0, length1 = tablas.length; i < length1; i++){
    	if(tablas[i].id != "detalleValidar"){
    		tablas[i].id = `articulos_vale${i}`;
    	}
    }
	var paneles = document.getElementsByClassName("panel-collapse");
	for (let x = 0; x < paneles.length; x++) {
        const panel = paneles[x];
        panel.setAttribute("id", "collapseVale"+x);
    }

    var titulos = document.getElementsByClassName("panel-title");
    for(var i = 0, length1 = titulos.length; i < length1; i++){
    	titulos[i].id = `encabezado${i}`;
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
    	clearOrden();
        $("#myModal").hide();
    });
    $('button[id="cancelarValid"]').click(function(){
        clearOrden();
        $("#myModal").hide();
    });

    function clearOrden(){
    	var tabla_orden = document.getElementById("detalleValidar");
    	var detalles = tabla_orden.children[1];
    	for(var i = 0, length1 = detalles.children.length; i < length1; i++){
    		var hijo =detalles.children[i].lastElementChild;
			while (hijo) {
				detalles.children[i].removeChild(hijo);
				hijo=detalles.children[i].lastElementChild;
			}
    	}
    }

    var forms = document.getElementsByClassName("submit-form");
    for(var i = 0, length1 = forms.length; i < length1; i++){
    	forms[i].id = `${forms[i].id}${i}`;
    }

    var btns_validar = document.getElementsByClassName("btn-validar");
    for (var i = 0; i < btns_validar.length; i++) {
        btns_validar[i].setAttribute("id", `${btns_validar[i].id}${i}`);
        btns_validar[i].addEventListener("click", function(event){
            event.preventDefault();
            var index = parseInt((event.target.id).split("Validar")[1]);
            var form = document.getElementById("submitForm"+index);
            if(form.checkValidity()){
            	llenarOrden(index);
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
        	clearOrden();
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

function getDetalles(fecha, folio, button){
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
		        data: {fecha:fecha, folio:folio, _token:token},
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
	                	'\nPorfavor contacte al departamento de tecnologías de la información';
	                alert.appendChild(closebtn);
	                alert.appendChild(info);
	                mensaje.appendChild(alert);
	                message.appendChild(mensaje);
	                cargarMetodo();
	                panel_padre.setAttribute("deployed", "true");
	                $("#loader").hide();
		        },
		        success: function(datos){
		            panel_padre.setAttribute("deployed", "true");
		            var contador = 0;
		            datos.forEach(function(element){
		            	var td = document.createElement("tr");
		            	td.setAttribute("name", `detalle${contador}`);
		            	var i = 0;
		            	for(var key in element){
		            		var tr = document.createElement("td");
		            		tr.setAttribute("id", `detalle${contador}_${i}`);
		            		tr.innerHTML=element[key];
		            		td.appendChild(tr);
		            		i++;
		            	}
		            	contador++;
		            	tabla_padre.children[1].appendChild(td);
		            });

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

function llenarOrden (index) {
	var tabla_art = document.getElementById(`articulos_vale${index}`);
	var detalles = tabla_art.children[1].children;
	var tabla = document.getElementById("detalleValidar");
	var tbody = tabla.children[1];
	for(var i = 0; i < detalles.length; i++){
		var tr = document.createElement("tr");
		var articulo_aux = detalles[i].children;
		for(var j = 0; j < articulo_aux.length; j++){
			var td = document.createElement("td");
			var input = document.createElement("input");
			input.setAttribute("name",`${j}[]`);
			if(j!=3){
				input.setAttribute("type","text");
				input.setAttribute("value", `${articulo_aux[j].innerHTML}`);
				input .setAttribute("readonly", "");
			}else{
				input.setAttribute("type","number");
				input.setAttribute("value", `${articulo_aux[j].innerHTML}`);
				input.setAttribute("min", "0");
				input.setAttribute("max", `${articulo_aux[j].innerHTML}`);
			}
			td.appendChild(input);
			tr.appendChild(td);
		}
		tbody.appendChild(tr);
	}
	var encabezado = document.getElementById(`encabezado${index}`).children;
	var parent = tabla.parentNode;
	for(var i = 0, length1 = encabezado.length; i < length1-1; i++){
		var input = document.createElement("input");
		input.setAttribute("type", "hidden");
		input .setAttribute("name", "encabezado[]");
		input.setAttribute("value", `${encabezado[i].innerHTML.trim()}`);
		parent.appendChild(input);
	}

	var tipo = null;
	var radios = document.getElementsByName('tipo');
	for(var i = 0, length1 = radios.length; i < length1; i++){
		if(radios[i].checked){
			tipo=radios[i];
		}
	}
	console.log(tipo);

	var input_aux = document.createElement("input");
	input_aux.setAttribute("type","hidden");
	input_aux.setAttribute("name", "extemporaneo");
	input_aux.setAttribute("value", `${tipo.value}`);
	parent.appendChild(input_aux);
}