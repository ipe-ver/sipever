 $(document).ready(function(){
    var contador = 0;
    $('select[id="selectPartida"]').on('change', function(){
        var partida_aux = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        if(partida_aux){
            $.ajax({
                url: "/almacen/facturas/buscarArticulo",
                type: "POST",
                dataType: "json",
                data: {partida: partida_aux, _token:token},
                success: function(datos){
                    $('select[name="articulos"]').empty();
                    $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
                    $.each(datos, function(i, data){
                       $('select[name="articulos"]').append('<option value="'+ data.clave +'">'+ data.descripcion +'</option>');
                    });

                }
            });
        } else{
            $('select[name="articulos"]').empty();
            $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
        }
    });
    $('button[id="btn-agregar"]').submit(function(event){
        var inputs = new Array(5);
        var row_articulo=document.createElement("tr");
        var clave = $('select[id="selectArticulo"]').val();
        var descripcion = $('select[id="selectArticulo"] option:selected').text();
        var precio = $('input[name="precio"]').val();
        var cantidad = $('input[name="cantidad"]').val();
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
        });

        inputs[0].setAttribute("name", "claveArticulo[]");
        inputs[0].setAttribute("value", clave);
        inputs[1].setAttribute("name", "descripcionArticulo[]");
        inputs[1].setAttribute("value", descripcion);
        inputs[2].setAttribute("name", "precioArticulo[]");
        inputs[2].setAttribute("value", precio);
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
        $('input[name="precio"]').val("");
        $('input[name="cantidad"]').val("");
        $('table[id="articulos_factura"]').append(row_articulo);
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
});

function clrscr(){
    $('select[id="selectPartida"]').val("");
    $('select[name="articulos"]').empty();
    $('select[name="articulos"]').append('<option value="">Seleccione un artículo</option>');
    $('input[name="precio"]').val("");
    $('input[name="cantidad"]').val("");
}