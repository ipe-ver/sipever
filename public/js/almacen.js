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
var paneles = document.getElementsByClassName("panel-collapse");
if(paneles!=null){
    for (let x = 0; x < paneles.length; x++) {
        const panel = paneles[x];
        panel.setAttribute("id", "collapseUsuario"+x);
    }
    var botones = document.getElementsByClassName("btn-left");
    for (let index = 0; index < botones.length; index++) {
        const boton = botones[index];
        boton.setAttribute("id", "verUsuario"+index);
        boton.setAttribute("data-target", "#collapseUsuario"+index);
    }
}
