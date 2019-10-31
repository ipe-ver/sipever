window.addEventListener("load", function(){
    cargarMetodo();
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

function getParentButton(button,nameButton, idReference){
    var id_aux = parseInt(button.id.split(nameButton)[1]);
    var idParent = `${idReference}${id_aux}`;
    var tablas = document.getElementsByName("detalle");
    return getParent(tablas[0],6);

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
	var padre = getParentButton(button,"verVale","collapseVale");
	if(padre){
		if(!padre.hasAttribute("deployed")){
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
		            console.log(datos);
		            padre.setAttribute("deployed", "true");
		        }
		    });
		}else{
			padre.removeAttribute("deployed");
		}
	}
}