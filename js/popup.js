var btnAbrirPopup = document.getElementById('btn-abrir-popup'), /*Creo las variables*/
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup'),
    btnElegir = document.getElementById('btn-elegir'),
    mediaQuery = window.matchMedia('(min-width: 1028px)'), /*Guarda la media query*/
    margenWrap = document.getElementById('wrap');


btnAbrirPopup.addEventListener('click',function(){
    overlay.classList.add('active'); /*agrega la clase active a la de overlay*/
    popup.classList.add('active');   /*agrega la clase active a la de popup*/
    if(mediaQuery.matches) {         /*Si se produce la media query min-width 1028*/
        margenWrap.classList.add('wrapConPopup'); /*agrega la clase wrapConPopup que te tira el article para la izquierda*/
    } else{       
    }
});

btnCerrarPopup.addEventListener('click',function(){
    overlay.classList.remove('active'); /*agrega la clase active a la de overlay*/
    popup.classList.remove('active');
    margenWrap.classList.remove('wrapConPopup'); /*remueve la clase wrapConPopup para que devuelva el article al medio*/
});

btnElegir.addEventListener('click',function(){  /*activa el radiobutton*/
    document.querySelector('#radiobutton').checked = true; /*selecciona el check de ese sabor*/
    overlay.classList.remove('active');
    popup.classList.remove('active');    
    margenWrap.classList.remove('wrapConPopup'); /*remueve la clase wrapConPopup para que devuelva el article al medio*/
});
