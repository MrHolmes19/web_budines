
/*---------------- Menu desplegable --------------*/

$(document).ready(main);
var contador = 1;
function main() {
    $('.menu_bar').click(function () {
        if (contador == 1) {
            contador = 0;
            $('nav').animate({ left: '0%' });
            $('body').addClass('noscroll');
        }
        else {
            contador = 1;
            $('nav').animate({ left: '-100%' });
            $('body').removeClass('noscroll');
        }
    });
    $(window).resize(function () {
        contador = 1;
        if (window.innerWidth > 768) {
            $('nav').removeAttr('style');
            $('body').removeClass('noscroll');
        }
    });
}

/*------------- Cambiar texto Copyright -----------*/

window.addEventListener("resize", cambiarTextoCR); /*evento que se ejecuta cuando se hace un cambio de tamaño en la pagina*/

function cambiarTextoCR() {    
    var width = document.documentElement.clientWidth;   /*mide ancho de la pantalla*/
    
    if (width > 410){
        document.getElementById("copyright").innerHTML = "©2020 Página diseñada y mantenida por LAGH. Todos los derechos reservados.";
 
    }else{
        document.getElementById("copyright").innerHTML = "©2020 LAGH. Todos los derechos reservados.";
    }
}
