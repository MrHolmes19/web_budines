        <footer>            
            <div class="flechas">
                <div class=flecha_atras>
                    <a href="#"> <img src="imagenes/flechas/flecha-rosa-atras.png" alt="flecha atras"> </a> 
                </div>
                <div class=flecha_siguiente>
                    <a href="#"><img src="imagenes/flechas/flecha-rosa-siguiente.png" alt="flecha atras"> </a>
                </div>
            </div>

            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
        

    <script> 

    var paginas = ["index.php", "extras.php", "cobertura.php", "total.php"];

    var indice = paginas.findIndex(x => x == href);


     var f_siguente = document.querySelector(".flecha_siguiente a");
     f_siguente.href= paginas[indice+1];
    
     var f_siguente = document.querySelector(".flecha_atras a");
     f_siguente.href= paginas[indice-1];

     </script>