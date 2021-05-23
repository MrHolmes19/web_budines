<?php
// Recibe los datos y los actualiza en la BBD: tablas de productos
include("../conexion.php");

if (isset($_POST["editar"])) {
    $id = $_POST["id"];
    $tabla = $_POST["tabla"];
    $producto = $_POST["producto"];
    $precio = $_POST["precio"];
    $disponible = $_POST["disponible"];
    $fotoAnterior = $_POST["fotoAnterior"];


    /*----------------- Codigo para efectuar el guardado de la imagen cargada en cargar_bd.php-----------------*/

    // Se reciben los datos de la imagen
    $nombre_imagen=$_FILES ['imagen']['name']; //FILES es una variable/array superglobal. Almacena varios datos y propiedades de la imagen
    $tipo_imagen=$_FILES ['imagen']['type']; //Almacena el tipo de la imagen
    $tamaño_imagen=$_FILES ['imagen']['size']; //Tamaño de la imagen
    
    //Se colocan las limitaciones de los archivos que se suben
    if($tamaño_imagen<=1000000){    // = a 1 mb
        if($tipo_imagen="image/jpg" || $tipo_imagen="image/jpeg" || $tipo_imagen="image/png"){
    
    //Se le indica la ruta donde se guardará la imagen en servidor
    $carpeta_destino=$_SERVER ['DOCUMENT_ROOT'].'/web_budines/imagenes/img_subidas/'; //server es otra variable superglobal.
    
    //Se mueve la imagen desde el directorio temporal al directorio escogido
    move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen); //tmp_name es la para colocar el nombre de la carpeta de guardado temporal
    
        }
        else{
            echo "No se permite este tipo de archivo. Suba imagenes .JPEG, .JPG o .PNG";
        }
    } else{
        echo "Tamaño demasiado grande. Reduzca el tamaño de la imagen a 1 MB máximo";
    }

    //compara el nombre de imagen anterior y imagen nueva y borra la anterior si son distintas
    if (strcmp($fotoAnterior, $$nombre_imagen) !== 0){
        unlink('../../imagenes/img_subidas/' . $fotoAnterior); /*Unlink es un metodo para borrar archivos*/
    }


    //----------------------------------------------------------

    if ($tabla == "sabores_clasicos" or $tabla == "sabores_especiales") {
        $agregadosmax = $_POST["agregadosmax"];
        $cobertura = $_POST["cobertura"];

        $query = "update `$tabla` set Producto = '$producto', Precio = '$precio',
        Disponible = '$disponible', LimAgregados = '$agregadosmax', Cobertura = '$cobertura',
        Foto = '$nombre_imagen' where ID= $id";
    } else {

        $query = "update `$tabla` set Producto = '$producto', Precio = '$precio',
        Disponible = '$disponible', Foto = '$nombre_imagen' where ID= $id";
    }

    $result = mysqli_query($conexion, $query);
    if (!$result){
        die("query fallida");
    } 

    if($result){
        $_SESSION["alerta"] = true;
        $_SESSION["alertaTipo"] = "editar";
        $_SESSION["mensaje"] = "Elemento editado con exito";
    }

    header("Location: administrador.php");

}