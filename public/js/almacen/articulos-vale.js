$("#loader2").show();
$(document).ready(function(){
    cargarMetodo();
    $("#loader2").hide();
    var contador = 0;
    $('select[id="selectPartida"]').on('change', function(){
        var partida_aux = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        if(partida_aux){
            $.ajax({
                url: "vales/buscarArticulo",
                type: "POST",
                dataType: "json",
                data: {partida: partida_aux, _token:token},
                beforeSend: function(){
                    $("#loader").show();
                },
                success: function(datos){
                    $('select[name="articulos"]').empty();
                    $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
                    $.each(datos, function(i, data){
                       $('select[name="articulos"]').append('<option value="'+ data.clave + ' '+ data.descripcion_u_medida +'">'+ data.descripcion +'</option>');
                    });
                    $("#loader").hide();
                },
                error: function(){
                    alert('Error al conectarse con la base de datos\nPorfavor contecte al departamento de tecnologías de la información');
                    $("#loader").hide();
                },
                timeout:5000
            });
        } else{
            $('select[name="articulos"]').empty();
            $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
        }
    });
    $('button[id="btn-agregar"]').on("click",function(){
        var value = $('select[id="selectArticulo"]').val();
        var unidad = value.split(" ")[1];
        var inputs = new Array(5);
        var row_articulo=document.createElement("tr");
        var clave = value.split(" ")[0];
        var descripcion = $('select[id="selectArticulo"] option:selected').text();
        var cantidad = $('input[name="cantidad"]').val();
        if(comprobarValores(new Array(clave,descripcion,cantidad))){
            for (var i = 0; i < inputs.length-1; i++) {
                inputs[i] = document.createElement("input");
                inputs[i].setAttribute("class", "form-control");
                inputs[i].setAttribute("type", "text");
                inputs[i].setAttribute("readonly", "");
            }

            inputs[4] = document.createElement("button");
            inputs[4].setAttribute("class", "btn-collapse");
            inputs[4].setAttribute("type", "button");
            inputs[4].innerHTML="&times;"
            inputs[4].addEventListener("click", function(){
                row_articulo.remove();
                var subtotal_calc = calcularSubtotal();
                $('input[id="subtotal"]').val(subtotal_calc);
                calcularTotal(subtotal_calc);
            });

            inputs[0].setAttribute("name", "claveArticulo[]");
            inputs[0].setAttribute("value", clave);
            inputs[1].setAttribute("name", "descripcionArticulo[]");
            inputs[1].setAttribute("value", descripcion);
            inputs[2].setAttribute("name", "unidadArticulo[]");
            inputs[2].setAttribute("value", unidad);
            inputs[3].setAttribute("name", "cantidadArticulo[]");
            inputs[3].setAttribute("value", cantidad);
            for (var i = 0; i < inputs.length; i++) {
                var td_input = document.createElement("td");
                td_input.appendChild(inputs[i]);
                row_articulo.appendChild(td_input);
            }
            $('select[id="selectPartida"]').val("");
            $('select[name="articulos"]').empty();
            $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
            $('input[name="cantidad"]').val("");
            $('table[id="articulos_vale"]').append(row_articulo);
        }else{
            alert("Porfavor complete todos los campos");
            /*var alertcont=document.createElement("div");
            alertcont.setAttribute("class", "alert-container");*/
        }
    });

    $('button[id="btn-cancelar"]').on("click",clrscr);
    $('button[id="closebtn"]').on("click", clrscr);

    $('input[id="subtotal"]').keyup(function(){
        if($(this).val().trim()!=""){
            if(!isNaN($(this).val())){
                var total = $('input[id="total"]');
                var value = parseFloat($(this).val());
                if(!isNaN(parseFloat($('input[id="iva"]').val()))){
                    var iva = parseFloat($('input[id="iva"]').val());
                    var iva_aplicado = (iva * value) / 100;
                    total.val(value + iva_aplicado);
                }else{
                    total.val(0);
                }
            }
        }else{
            $('input[id="total"]').val(0);
        }
    });
    $('input[id="iva"]').bind('keyup mouseup', function(){
        if(!isNaN($(this).val())){
            var iva = parseFloat($(this).val());
            var total = $('input[id="total"]');
            if(!isNaN(parseFloat($('input[id="subtotal"]').val()))){
                var value = parseFloat($('input[id="subtotal"]').val());
                var iva_aplicado = (iva * value) / 100;
                total.val(value + iva_aplicado);
            }else{
                total.val(0);
            }
        }
    });

    $("#valeCompra").on('click', function(){
        $('#btnAgregarArticulo').hide();
        $("#btnAgregarArticuloCompra").show();
        $("#btnAgregarArticuloCompra").removeAttr("disabled");
        clearTabla();
    });

    $("#valeComun").on('click', function(){
        $('#btnAgregarArticulo').show();
        $("#btnAgregarArticuloCompra").hide();
        $("#btnAgregarArticuloCompra").attr('disabled','disabled');
        clearTabla();
    });

    $("#btnAgregarArticuloCompra").click(function(){
        var clave = document.createElement("input");
        var inputs = new Array(5);
        var row_articulo=document.createElement("tr");

        for (var i = 0; i < inputs.length-1; i++) {
            inputs[i] = document.createElement("input");
            inputs[i].setAttribute("class", "form-control");
            inputs[i].setAttribute("type", "text");
        }

        inputs[4] = document.createElement("button");
        inputs[4].setAttribute("class", "btn-collapse");
        inputs[4].setAttribute("type", "button");
        inputs[4].innerHTML="&times;"
        inputs[4].addEventListener("click", function(){
            row_articulo.remove();
        });

        inputs[0].setAttribute("name", "claveArticulo[]");
        inputs[0].setAttribute("value", 'N/A');
        inputs[0].setAttribute("readonly", "");
        inputs[1].setAttribute("name", "descripcionArticulo[]");
        inputs[1].setAttribute("value", '');
        inputs[1].setAttribute("required", "");
        inputs[2].setAttribute("name", "unidadArticulo[]");
        inputs[2].setAttribute("value", 'N/A');
        inputs[2].setAttribute("readonly", "");
        inputs[3].setAttribute("name", "cantidadArticulo[]");
        inputs[3].setAttribute("value", 0);
        inputs[3].setAttribute("required", "");
        inputs[3].setAttribute("type", "number");
        inputs[3].setAttribute("min", 0);

        for (var i = 0; i < inputs.length; i++) {
            var td_input = document.createElement("td");
            td_input.appendChild(inputs[i]);
            row_articulo.appendChild(td_input);
        }
        $('table[id="articulos_vale"]').append(row_articulo);
    });

    $('#btnEnviarVale').on('click', function(event){
        var orden = document.getElementById("ordenSolicitud");
        var tipo_mensaje = 0;
        if(orden.checkValidity()){
            var tabla = $('table[id="articulos_vale"]')[0].children[0].children;
            if(tabla.length > 1){
                var descripciones = $("input[name='cantidadArticulo[]']");
                for (var i = 0; i < descripciones.length; i++) {
                    if(parseInt(descripciones[i].value) == 0){
                        tipo_mensaje = 3;
                        break;
                    }
                }
                if(tipo_mensaje != 3){
                    return;
                }
            }else{
                tipo_mensaje = 1;
            }
        }
        event.preventDefault();

        descripciones = $("input[name='descripcionArticulo[]']");
        for (var i = 0; i < descripciones.length; i++) {
            if(!descripciones[i].value.trim()){
                tipo_mensaje = 2;
                break;
            }
        }

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
        if(tipo_mensaje == 0){
            
        }else{
            
        }
        switch (tipo_mensaje) {
            case 0:
                info.innerHTML="Por favor seleccione el tipo de solicitud";
                break;
            case 1:
                info.innerHTML="Por favor agregue por lo menos un artículo a la solicitud";
                break;
            case 2:
                info.innerHTML="Porfavor ingrese la descripción de todos los artículos";
                break;
            case 3:
                info.innerHTML="Porfavor ingrese una cantidad real";
                break;
            default:
                break;
        }
        alert.appendChild(closebtn);
        alert.appendChild(info);
        mensaje.appendChild(alert);
        message.appendChild(mensaje);
        cargarMetodo();
    });

});

function clrscr(){
    $('select[id="selectPartida"]').val("");
    $('select[name="articulos"]').empty();
    $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
    $('input[name="cantidad"]').val("");
}

function comprobarValores(valores){
    for (var i = 0; i < valores.length; i++) {
        if(valores[i].trim()==""){
            return false;
        }
    }
    return true;
}

function clearTabla(){
    var tabla = $('table[id="articulos_vale"]')[0].children[0].children;

    while(tabla.length > 1){
        tabla[tabla.length-1].remove();
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
