$("#loader2").show();
$(document).ready(function(){
    $("#loader2").hide();
    var contador = 0;
    $('select[id="selectPartida"]').on('change', function(){
        var partida_aux = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        if(partida_aux){
            $.ajax({
                url: "/almacen/vales/buscarArticulo",
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
                }
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
