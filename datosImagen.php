<!----------------- Codigo para efectuar el guardado de la imagen cargada en cargar_bd.php-------------------> 


<?php
// Se reciben los datos de la imagen
$nombre_imagen=$_FILES ['imagen']['name']; //FILES es una variable/array superglobal. Almacena varios datos y propiedades de la imagen
$tipo_imagen=$_FILES ['imagen']['type']; //Almacena el tipo de la imagen
$tamaño_imagen=$_FILES ['imagen']['size']; //Tamaño de la imagen

//Se colocan las limitaciones de los archivos que se suben
if($tamaño_imagen<=1000000){    // = a 1 mb
    if($tipo_imagen="image/jpg" || $tipo_imagen="image/jpeg" || $tipo_imagen="image/png"){

//Se le indica la ruta donde se guardará la imagen en servidor
$carpeta_destino=$_SERVER ['DOCUMENT_ROOT'].'/web_budines/img_subidas/'; //server es otra variable superglobal.

//Se mueve la imagen desde el directorio temporal al directorio escogido
move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen); //tmp_name es la para colocar el nombre de la carpeta de guardado temporal

    }
    else{
        echo "No se permite este tipo de archivo. Suba imagenes .JPEG, .JPG o .PNG";
    }
} else{
    echo "Tamaño demasiado grande. Reduzca el tamaño de la imagen a 1 MB máximo";
}

//Se sube a la base de datos

require("php/conexion.php"); //igual que include pero si no lo encuentro tira un error y no permite seguir

if(mysqli_connect_errno()){
    echo "Error al conectarse con la Base de Datos";
    exit();
}

mysqli_select_db($conexion, 'bd_budines') or die ("No se encuentra la Base de Datos");
mysqli_set_charset($conexion, "utf8");

$sql="UPDATE sabores_clasicos SET Foto='$nombre_imagen' WHERE ID='3'";
$resultado=mysqli_query($conexion,$sql);

header("Location: cargar_bd.php");

?>