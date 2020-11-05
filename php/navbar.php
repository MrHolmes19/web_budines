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
                    <li> <a href="extras.php"> <span class="icon-fire"></span>Agregados </a> </li>
                    <li> <a href="cobertura.php"> <span class="icon-download"></span>Cobertura </a> </li>
                    <li> <a href="total.php"> <span class="icon-clipboard"></span>Resumen </a> </li>
                    <li> <a href="#"> <span class="icon-file-text2"></span>Datos</a> </li>
                </ul>
            </nav>
        </div>
    </header>

<script>

var pagina = document.URL;
var array = pagina.split("/");
var href = array[array.length - 1];

var btn_activo = document.querySelector("a[href='"+ href +"']");

btn_activo.setAttribute("class","activo");

</script>

