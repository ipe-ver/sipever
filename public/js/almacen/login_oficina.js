$("#loginModal").show();
$("#loader").show();
$(document).ready(function(){
	var dic = {};
	var cookies = decodeURIComponent(document.cookie).split(';');
	for(var i = 0; i < cookies.length; i++){
	    var partes = cookies[i].split('=');
	 	dic[partes[0].substring(1)] = partes[1].trim();
	}
	
	if(dic['__office_session'] != undefined){
		$("#loader").hide();
		$("#loginModal").hide();
	}else{
		$("#loader").hide();
	}

	$("#oficina_login").submit(function(){
		var token = $('meta[name="csrf-token"]').attr('content');
		var codigo = $("#officeCode").val();
		$.ajax({
			url: "/almacen/vales/getDetalles",
	        type: "POST",
	        dataType: "json",
	        data: {code:codigo, _token:token},
	        
		});
	});
});