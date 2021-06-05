/* Funcionalidad de boton vista previa */

var btnAbrirPopup2 = document.getElementById('btn-abrir-popup'), 
    btnAbrirPopup = document.getElementsByClassName('btn-abrir-popup'), 
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup'),
    btnElegir = document.getElementById('btn-elegir'),
    mediaQuery = window.matchMedia('(min-width: 1028px)'), //Guarda la media query
    margenWrap = document.getElementById('wrap'),
    imagen = document.querySelector('#img-popup'),
    titulo = document.querySelector('#titulo-popup');
    var titulo_foto;
    
// Funcion para abrir ventana emergente (Es llamada por cada botón, y pasa los respectivos parametros)
function abrirPopup(nombre_foto, titulo_foto, e){
    e = e || window.event; //capturo el evento
    e.preventDefault(); //evita que envie el formulario
    this.titulo_foto = titulo_foto;
    imagen.setAttribute('src','../../imagenes/img_subidas/'+nombre_foto); //Modifica la url de la img para que tome la que se mandó como atributo 
    //titulo.innerHTML = titulo_foto; //Cambia el titulo de la imagen (Funciona)
    titulo.textContent = titulo_foto; //Cambia el titulo de la imagen (Otra forma de hacerlo)
    overlay.classList.add('active');
    popup.classList.add('active');
    if(mediaQuery.matches) {         //Si se produce la media query min-width 1028
        margenWrap.classList.add('wrapConPopup'); //agrega la clase wrapConPopup que te tira el article para la izquierda
    } else{       
    }
    // Funcion para marcar el radiobutton activo (Dentro de la funcion abrir popup para que aproveche el parametro titulo_foto)
    
    btnElegir.removeEventListener('click', seleccionarItem); // quita el evento anterior para no acumular eventlistener

    btnElegir.addEventListener('click', seleccionarItem); //agrega el evento para seleccionar item
    
};

//funcion para elegir el item de la vista previa actual
function seleccionarItem(){
    let titulo_foto2 = titulo_foto.replaceAll(' ','_'); //Para que matchee con el ID de cada radiobutton cuando hay palabras espaciadas
    document.querySelector('#'+titulo_foto2).checked = true; //selecciona el check de ese sabor
    overlay.classList.remove('active'); //Cierra la ventana emergente luego de seleccionar
    popup.classList.remove('active');    
    margenWrap.classList.remove('wrapConPopup'); //remueve la clase wrapConPopup para que devuelva el article al medio
}

// Funcion para cerrar ventana emergente
btnCerrarPopup.addEventListener('click',function(){
    overlay.classList.remove('active'); //agrega la clase active a la de overlay
    popup.classList.remove('active');
    margenWrap.classList.remove('wrapConPopup'); //remueve la clase wrapConPopup para que devuelva el article al medio
});

/* Para cerrar la ventana cuando se cliquea afuera */
window.onload=function() /* Dispara el evento cuando se cargó toda la pagina*/
{
    var ocultarPopup=document.getElementById('overlay');
    document.onclick=function(e)     /*Funciona cuando se le dá click*/
    {
        if((e.target.className =='overlay active' || e.target.className =='') && overlay.classList.contains('active'))  /*verifica que tenga la clase overlay active o que no tenga clase. Tambien se puede poner e.target.id =='overlay' pero en version mayor a 1028px no cerraria al haber achicado al 50% con left:50%*/
        {
            overlay.classList.remove('active');   /*Cierra/oculta la ventana popup al ya no tener la clase active*/
            popup.classList.remove('active'); /*Se puede quitar*/   
            margenWrap.classList.remove('wrapConPopup'); //remueve la clase wrapConPopup para que devuelva el article al medio         
        }
    };
};