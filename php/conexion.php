<?php
// Conexion a BBDD
//cambiar el valor de la variable baseDeDatos para elegir una u otra.
$baseDeDatos = "remoto-heroku";
$conexion;

if ($baseDeDatos == "remoto-heliohost") {

  $conexion = mysqli_connect(   //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
    'johnny.heliohost.org',     //servidor
    'sensei_1',                 //usuario
    '12345',                    //contraseña
    'sensei_budines'            //nombre bd   
  );
}

if ($baseDeDatos == "remoto-heroku") {
  
  $host= 'remotemysql.com';
  $user = 'lrxwbOP3Ac';
  $password = 'ZfHR5T6NSp';
  $dbname = 'lrxwbOP3Ac';
  $port = '3306';

  $conexion = mysqli_connect($host, $user, $password, $dbname);   //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
  
}

if ($baseDeDatos == "remoto-heroku-postgreSQL") {
  //$host = 'postgres://txdwdorzirxbxe:c5e6e7f857172934c1e6267974ee21f42add099507bda7433525c85fb28104bd@ec2-52-87-107-83.compute-1.amazonaws.com:5432/dcb7bpdulh7nj2';
  $host= 'ec2-52-87-107-83.compute-1.amazonaws.com';
  $user = 'txdwdorzirxbxe';
  $password = 'c5e6e7f857172934c1e6267974ee21f42add099507bda7433525c85fb28104bd';
  $dbname = 'dcb7bpdulh7nj2';

  $conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");   //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
  
}

if ($baseDeDatos == "local") {

  $conexion = mysqli_connect(    //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
    'localhost',                 //servidor local
    'root',                     //usuario por defecto
    '',                         //sin contraseña
    'bd_budinesweb'             //nombre bd  
  );
}

if ($baseDeDatos == "local2") {

  $conexion = mysqli_connect(    //funcion para conectarse a la bd. La guarda en una variable para utilizarla luego
    'localhost',                 //servidor local
    'root',                     //usuario por defecto
    '',                         //sin contraseña
    'bd_budines'                //nombre bd  
  );
}

//si no existe la session crea una.
if (!isset($_SESSION)) {
  session_start();
}

if(!$conexion){
  //print pg_last_error($conexion);
  header("Location: error.php?error=error al conectar con Base De Datos");
}
