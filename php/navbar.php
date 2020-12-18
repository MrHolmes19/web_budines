<header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><Span class="icon-menu"></Span> Menu</a>
        </div>
        <div id="menu">
            <nav>
                <ul class="enlaces">
                    <li> <a href="login.php"> <span class="icon-cart"></span>Inicio </a> </li>
                    <li> <a href="forma.php"> <span class="icon-magic-wand"></span>Forma </a> </li>
                    <li> <a href="sabor.php"> <span class="icon-pacman"></span>Sabor </a> </li>
                    <li> <a href="agregados.php"> <span class="icon-fire"></span>Agregados </a> </li>
                    <li> <a href="cobertura.php"> <span class="icon-download"></span>Cobertura </a> </li>
                    <li> <a href="total.php"> <span class="icon-clipboard"></span>Resumen </a> </li>
                    <li> <a href="formulario.php"> <span class="icon-file-text2"></span>Datos</a> </li>
                </ul>
            </nav>
        </div>
    </header>

<script>

var pagina = document.URL;    /*Lee el url de la pagina activa*/
var array = pagina.split("/");  /*Separa la url por "/" */
var href = array[array.length - 1]; /*toma el ultimo valor Long - 1 = 2 y empieza en 0, entonces es el tercer elemento "/" */
var itemnav = href.split(".") //(agarro lo que esta detras de .php (cuando se apretaba un boton se ponia # al final y no lo tomaba)
var btn_activo = document.querySelector("a[href='"+ itemnav[0] +".php']");  /*la variable guarda el enlace de la pagina que seleccione antes (La actual)*/

btn_activo.setAttribute("class","activo"); /* Pone la clase "activo" a ese enlace*/


/*---------------------------bloquear pastañas no visitadas-------------------------------*/
var pestañaMax = <?= $_SESSION["pestaña"]; ?>

var enlaces = document.querySelectorAll("#menu .enlaces a");

for(let i = 6; i > pestañaMax; i--){
    enlaces[i].setAttribute("class","bloqueado");
}


</script>

