var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
        setTimeout(function(){
            var alertContainer=document.getElementById("contenedor-alert");
            if(alertContainer!=null){
                alertContainer.remove();
            }
        }, 1000);
    }
}

var paneles = document.getElementsByClassName('panel-menu');
for (var i = paneles.length - 1; i >= 0; i--) {
    paneles[i].setAttribute("id", "Articulo"+i);
 }

var btn_editar=document.getElementsByClassName("btn-edit");
for (var i = 0; i < btn_editar.length; i++) {
    btn_editar[i].setAttribute("id", btn_editar[i].id+i);
}

var btn_eliminar=document.getElementsByClassName("btn-delete");
for (var i = 0; i < btn_eliminar.length; i++) {
    btn_eliminar[i].setAttribute("id", btn_eliminar[i].id+i);
}

var paneles = document.getElementsByClassName("panel-collapse");
if(paneles!=null){
    for (let x = 0; x < paneles.length; x++) {
        const panel = paneles[x];
        panel.setAttribute("id", "collapseArticulo"+x);
    }
    var botones = document.getElementsByClassName("btn-left");
    for (let index = 0; index < botones.length; index++) {
        const boton = botones[index];
        boton.setAttribute("id", "verArticulo"+index);
        boton.setAttribute("data-target", "#collapseArticulo"+index);
        boton.setAttribute("aria-controls", "collapseArticulo"+index);
        boton.addEventListener('click', function(){
            var btn_editar_aux = document.getElementById('btn_editar'+index);
            if(btn_editar_aux.hasAttribute("disabled")){
                btn_editar_aux.removeAttribute("disabled");
            }else{
                btn_editar_aux.setAttribute('disabled', 'true');
            }
            var btn_eliminar_aux = document.getElementById('btn_eliminar'+index);
             if(btn_eliminar_aux.hasAttribute("disabled")){
                btn_eliminar_aux.removeAttribute("disabled");
            }else{
                btn_eliminar_aux.setAttribute('disabled', 'true');
            }
        });
    }
}
