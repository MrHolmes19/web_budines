
    var paginas = ["login.php", "forma.php", "sabor.php", "agregados.php", "cobertura.php", "total.php", "formulario.php"];

    var indice = paginas.findIndex(x => x == href);

    
     var f_siguente = document.querySelector(".flecha_atras a");
     f_siguente.href= paginas[indice-1];