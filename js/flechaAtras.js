/* Se obtiene el link de la pagiana anterior, tomando la pagina actual(variable href viene del navbar) 
y restando una posicion al array */
    var paginas = ["index.html", "login.php", "forma.php", "sabor.php", "agregados.php", "cobertura.php", "total.php", "formulario.php"];

    var indice = paginas.findIndex(x => x == href);

     var f_siguente = document.querySelector(".flecha_atras a");
     f_siguente.href= paginas[indice-1];