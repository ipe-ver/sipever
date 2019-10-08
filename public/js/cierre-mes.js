window.addEventListener("load", function(){
	var btnMesIncrement=document.getElementById('mesIncrement');
	var btnMesDecrement=document.getElementById('mesDecrement');
	var input = document.getElementById('no_mes');
	btnMesIncrement.addEventListener("click",function(){
		if(parseInt(input.value) < 12){
			input.setAttribute("value", parseInt(input.value)+1);
		}
	});
	btnMesDecrement.addEventListener("click",function(){
		if(parseInt(input.value) > 1){
			input.setAttribute("value", parseInt(input.value)-1);
		}
	});
});
