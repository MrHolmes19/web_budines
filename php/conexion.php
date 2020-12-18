<?php
//cambiar el valor de la variable baseDeDatos para elegir una u otra.
$baseDeDatos = "local";
$conexion;

if ($baseDeDatos == "remoto") {

  $conexion = mysqli_connect(   //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
    'johnny.heliohost.org',     //servidor
    'sensei_1',                 //usuario
    '12345',                    //contraseña
    'sensei_budines'            //nombre bd   
  );
}

if ($baseDeDatos == "local") {

  $conexion = mysqli_connect(    //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
    'localhost',                 //servidor local
    'root',                     //usuario por defecto
    '',                         //sin contraseña
    'bd_budinesweb'             //nombre bd  
  );
}

//si no existe la session crea una.
if (!isset($_SESSION)) {
  session_start();
}
