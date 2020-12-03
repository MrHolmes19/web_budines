
<!----------------- CONEXION A BASE DE DATOS GLOBAL -------------------> 

<?php
/*
$conexion = mysqli_connect(   //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
  'johnny.heliohost.org',     //servidor local
  'sensei_1',               	//usuario por defecto
  '12345',                    //sin contraseña
  'sensei_budines'            //nombre bd   
);
*/
?>

<!----------------- CONEXION A BASE DE DATOS LOCAL -------------------> 

<?php

$conexion = mysqli_connect(    //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
  'localhost',                 //servidor local
  'root',                   	//usuario por defecto
  '',                         //sin contraseña
  'bd_budines'                 //nombre bd  
);

?>


<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
