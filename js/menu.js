
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

