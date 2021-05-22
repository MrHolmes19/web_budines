/*---------------- Menu desplegable --------------*/

$(document).ready(main);
var contador = 1;
function main() {
    $('.menu_bar').click(function () {
        if (contador == 1) {
            contador = 0;
            $('nav').animate({ left: '0%' }); //Muestra el menu
            $('body').addClass('noscroll');  //anula el scroll cuando se abre el menu
        }
        else {
            contador = 1;
            $('nav').animate({ left: '-100%' }); //Esconde el menu
            $('body').removeClass('noscroll');
        }
    });
    
    $(window).resize(function () {
        contador = 1;
        if (window.innerWidth > 768) {
            $('nav').removeAttr('style');  //Quita el formato comprimido y muestra todo el contenido
            $('body').removeClass('noscroll');
        }
    });
}

