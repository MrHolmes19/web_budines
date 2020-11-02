1) archivo de conexion base de datos (db.php)

<?php   /*sintaxis de php*/
$conn = mysqli_connect(    /*funcion para conectarse a la bd. La guarda en una variable para utilizarla luego parametros de la base de datos*/
  'localhost',          /*servidor local*/
  'root',             	/*usuario por defecto*/
  '',               /*sin contraseña*/
  'bd_algo'         /*nombre bd*/     
);

if(isset($conn)){      /*Condicional. Si existe el objeto de conexion */
  echo 'DB esta conectada';  /*Mensaje de conexion. - ELIMINAR, SOLO PRUEBA*/
}

?> /*sintaxis de php*/

-- EN EL HTML (Index.php) --

2) Trae Archivo para requerir la conexion

<?php include("db.php") ?>  /*Para que conecte ni bien comienza la aplicacion*/

3) Archivos para copiar los enlaces de html (Por ejemplo, Bootstrap, Javascript, Jquery, etc.

<?php include("includes/header.php") ?> /*Se suele poner los archivos que se repiten en una carpeta include*/
<?php include("includes/footer.php") ?>  /*Para los que se ponen al final del body (Js)*/

4) arma formulario en el HTML 

----

5) Crea Archivo PHP que toma los datos guardados

<?php

if(isset($_POST[¿save_task])){ /*Si existe a traves del metodo Post el valor save_task*/
  $title = $_POST['title']; /*recibe el titulo enviado a traves de POST y lo guardo en la variable titulo*/
  $title = $_POST['description']; /* Idem con el campo descripcion*/
  echo $title; /*muestra en pantalla la variable. - ELIMINAR, SOLO PRUEBA*/
  echo $description;

  $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')"; 
  /*Consulta a la base de datos "task" y le dice que insertará los campos title y description y en los campos title y description*/
  $result = mysqli_query($conn, $query); /*conn es la conexion y query la consulta*/
  if(!$result) {  /*Si no existe un resultado*/
   die("Query Failed");  /*terminar la aplicacion*/
  }
  echo 'saved';  /*Si existe, avisa que guardó - ELIMINAR, SOLO PRUEBA*/
  header("Location:index.php"); /*Redirecciona a la pantalla inicial*/
}

6) incluye db para conexion a base de datos


/**/