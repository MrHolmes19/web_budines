<!DOCTYPE html>
<html>

<head>
    <title>El Rincón de los Budines - Pagina principal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloIndex2.css">
    <link rel="icon" href="imagenes/icono.png">
</head>

<body>
    <header>
        <a class="header-logo"><img src="imagenes/logo.png" alt="El Ricón de los Budines"></a>
        <nav>
            <ul>
                <li><a href='#' class="no-link">Quienes somos</a></li>
                <li><a href='#' class="no-link">Nuestros productos</a></li>
                <li><a href='php/paginasPedido/login.php' class="no-link">Pedí tu budin</a></li>
                <li><a href='#' id="Admin" class="no-link" onclick="ventanaLogin()">ingresar como administrador</a></li>
                <li><a href='#' class="no-link">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="wrapper">
            <h2>¡Hola! bienvenido a nuestra pagina</h2>    
            <h3>contenido - contenido - contenido - contenido - contenido - 
                contenido - contenido - contenido - contenido - contenido - 
                contenido - contenido - contenido - contenido - contenido - 
                contenido - contenido - contenido - contenido - contenido - 
                contenido - contenido - contenido - contenido - contenido - 
                contenido - contenido - contenido - contenido - contenido - 
                contenido - contenido - contenido - contenido - contenido - </h2>         
        </section>
    </main>
    <footer>
        <ul class="footer-links-main">
            <li><a href="#">El Rincón de los Budines</a></li>
            <li><a href="#">Pedí tu budin</a></li>
            <li><a href="#">Acerca de nosotros</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
        <div class="footer-sm">
            <a href="https://www.youtube.com" target="_blank">
                <img src="imagenes/youtube_icon.png" alt="youtube icon">
            </a>
            <a href="https://www.twitter.com" target="_blank">
                <img src="imagenes/twitter_icon.png" alt="twitter icon">
            </a>
            <a href="https://www.facebook.com" target="_blank">
                <img src="imagenes/facebook_icon.png" alt="facebook icon">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="imagenes/instagram_icon.png" alt="instagram icon">
            </a>
        </div>
    </footer>
<!-----------login admin----------->

<div id="loginAdmin" class="escondido">
    <form action="php/admin/login.php" method="post">
        <h2>Usuario:</h2>
        <input type="text" name="user" id="user" value="budines">
        <h2>Contraseña:</h2>
        <input type="password" name="pass" id="pass" value="password">
        <input type="submit" name="login" id="login">
    </form>
</div>

<style>
#loginAdmin{
    
    position: absolute;
    transition: all 0.5s ease-out;
    z-index: 20;
    
  }

@keyframes Transparencia {
  from {
    opacity: 0.5;
    filter: blur(6px);
  }

  to {
    transform: rotate3D(2, 2, 2, 360deg); 
    opacity: 1;
    filter: blur(0px);
  }
}

.escondido{
    top: -45%;
    left: 60%;
    animation: GiroLoco 0.5s ease 0s forwards;
    border-radius: 50%;
    background-color: white;
}

.visible{
    top: 50%;
    left: 30%;
    animation: Transparencia 1s ease 0s forwards;
    border-radius: 5%;
    background-color: grey;
    border: 3px solid #ee7ba1;
    box-shadow: 0 0 5px black;
}

#loginAdmin form{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
}

#loginAdmin input{
    margin: 10px;
    font-size: 14px;
}


@keyframes GiroLoco {
  from {

 
  }

  to {
   transform: rotate3D(2, 2, 2, 360deg); 
   filter: blur(4px);
  }
}


</style>

<script>
var btnAdmin = document.getElementById("Admin");
var loginAdmin = document.getElementById("loginAdmin");

function ventanaLogin(){

    if(loginAdmin.className == "escondido"){
        loginAdmin.className = "visible";
    } else {
        loginAdmin.className = "escondido";
    }

}



</script>    


</body>

</html>