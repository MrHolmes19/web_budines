<?php
// Guarda en la BD los datos del nuevo producto cargado
include("../conexion.php");

if (isset($_POST["agregar"])) {
    $tabla = $_POST["tabla"];
    $producto = $_POST["producto"];
    $precio = $_POST["precio"];
    $disponible = $_POST["disponible"];


    /*------ Codigo para efectuar el guardado de la imagen cargada en cargar_bd.php------*/

    // Se reciben los datos de la imagen
    $nombre_imagen=$_FILES ['imagen']['name']; //FILES es una variable/array superglobal. Almacena varios datos y propiedades de la imagen
    $tipo_imagen=$_FILES ['imagen']['type']; //Almacena el tipo de la imagen
    $tamaño_imagen=$_FILES ['imagen']['size']; //Tamaño de la imagen
    
    //Se colocan las limitaciones de los archivos que se suben
    if($tamaño_imagen<=2000000){    // = a 2 mb
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
        echo "Tamaño demasiado grande. Reduzca el tamaño de la imagen a 2 MB máximo";
    }


    //----------------------------------------------------------

    if ($tabla == "sabores_clasicos" or $tabla == "sabores_especiales") {
        $agregadosmax = $_POST["agregadosmax"];
        $cobertura = $_POST["cobertura"];

        $query = "insert into `$tabla` (Producto, Precio, Disponible, LimAgregados, Cobertura, Foto) 
        values ('$producto','$precio', '$disponible', '$agregadosmax', '$cobertura', '$nombre_imagen')";
    } else {

        $query = "insert into `$tabla` (Producto, Precio, Disponible, Foto) 
        values ('$producto', '$precio', '$disponible', '$nombre_imagen')";
    }

    $result = mysqli_query($conexion, $query);
    if (!$result){
        die(mysqli_error($conexion));
    } 

    if($result){
        $_SESSION["alerta"] = true;
        $_SESSION["alertaTipo"] = "agregar"; //A futuro para modificar color segun alerta
        $_SESSION["mensaje"] = "Elemento agregado con exito";
    }

    header("Location: administrador.php");

}

