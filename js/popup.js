var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup'),
    btnElegir = document.getElementById('btn-elegir'),
    mediaQuery = window.matchMedia('(min-width: 1028px)'),
    margenWrap = document.getElementById('wrap');


btnAbrirPopup.addEventListener('click',function(){
    overlay.classList.add('active'); /*agrega la clase active a la de overlay*/
    popup.classList.add('active');   /*agrega la clase active a la de popup*/
    if(mediaQuery.matches) {
        margenWrap.classList.add('wrapConPopup');
        
        /*margenWrap.id = "WrapConPopup";
        /*margenWrap.removeAttribute('margin');
        margenWrap.setAttribute("style","transition:5s ease all;");
        /*margenWrap.setAttribute("style","transform: translateX(-100%);");
        */
        /*margenWrap.setAttribute("style","margin-left:5%;");       
        /*margenWrap.setAttribute("style","transition:5s ease all;");
        */
        /*margenWrap.style.transition = "margin-left 2s ease 2s";
        */       

    } else{
       
    }
});


btnCerrarPopup.addEventListener('click',function(){
    overlay.classList.remove('active'); /*agrega la clase active a la de overlay*/
    popup.classList.remove('active');
    /*margenWrap.setAttribute("style","margin:auto;");  /*Para que se centre el wrap en vista escritorio*/
    margenWrap.classList.remove('wrapConPopup');

});

btnElegir.addEventListener('click',function(){  /*activa el radiobutton*/
    document.querySelector('#radiobutton').checked = true;
    overlay.classList.remove('active');
    popup.classList.remove('active');
});
