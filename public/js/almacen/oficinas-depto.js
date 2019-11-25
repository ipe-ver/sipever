 /**
  * Este método se utiliza para cargar dinámicamente las oficinas correspondientes al departamento seleccionado
 */

 $("#loader").show();
 $(document).ready(function(){
    $("#loader").hide();
    /**
     * Cada vez que cambie el valor del select de departamento.
     */
    $('select[name="depto"]').on('change', function(){
        var ubpp_aux = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        if(ubpp_aux){
            $.ajax({
                url: "departamentos/buscaroficina",
                type: "POST",
                dataType: "json",
                data: {ubpp: ubpp_aux, _token:token},
                 beforeSend: function(){
                    $("#loader").show();
                },
                success: function(datos){
                    $('select[name="oficina"]').empty();
                    $('select[name="oficina"]').append('<option value="">Seleccione una oficina</option>');
                    $('select[name="oficina"]').append('<option value="0">Todas</option>');
                    $.each(datos, function(i, data){
                       $('select[name="oficina"]').append('<option value="'+ data.oficina +'">'+ data.descripcion +'</option>');
                    });
                    $("#loader").hide();
                }
            });
        } else{
            $('select[name="oficina"]').empty();
            $('select[name="oficina"]').append('<option value="">Seleccione una oficina</option>');
        }
    });
});