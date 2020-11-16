<header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><Span class="icon-menu"></Span> Menu</a>
        </div>
        <div id="menu">
            <nav>
                <ul class="enlaces">
                    <li> <a href="#"> <span class="icon-cart"></span>Inicio </a> </li>
                    <li> <a href="#"> <span class="icon-magic-wand"></span>Forma </a> </li>
                    <li> <a href="index.php"> <span class="icon-pacman"></span>Sabor </a> </li>
                    <li> <a href="agregados.php"> <span class="icon-fire"></span>Agregados </a> </li>
                    <li> <a href="cobertura.php"> <span class="icon-download"></span>Cobertura </a> </li>
                    <li> <a href="total.php"> <span class="icon-clipboard"></span>Resumen </a> </li>
                    <li> <a href="#"> <span class="icon-file-text2"></span>Datos</a> </li>
                </ul>
            </nav>
        </div>
    </header>

<script>

var pagina = document.URL;    /*Lee el url de la pagina activa*/
var array = pagina.split("/");  /*Separa la url por "/" */
var href = array[array.length - 1]; /*toma el ultimo valor Long - 1 = 2 y empieza en 0, entonces es el tercer elemento "/" */

var btn_activo = document.querySelector("a[href='"+ href +"']");  /*la variable guarda el enlace de la pagina que seleccione antes (La actual)*/

btn_activo.setAttribute("class","activo"); /* Pone la clase "activo" a ese enlace*/

</script>

