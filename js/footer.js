
/*------------- Cambiar texto Copyright -----------*/

function cambiarTextoCR() {    
    var width = document.documentElement.clientWidth;   /*mide ancho de la pantalla*/
    
    if (width > 410){
        document.getElementById("copyright").innerHTML = "©2020 Página diseñada y mantenida por LAGH. Todos los derechos reservados.";
 
    }else{
        document.getElementById("copyright").innerHTML = "©2020 LAGH. Todos los derechos reservados.";
    }
}

cambiarTextoCR();

window.addEventListener("resize", cambiarTextoCR); /*evento que se ejecuta cuando se hace un cambio de tamaño en la pagina*/

