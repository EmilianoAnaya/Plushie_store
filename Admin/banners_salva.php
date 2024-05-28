<?php
//salva.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$nombre       = $_REQUEST['nombre'];
$archivo_n    = $_FILES['archivo']['name'];
$archivo      = $_FILES['archivo']['tmp_name'];

$cadena     = explode(".",$archivo_n);          //Separa el nombre para obtener la expresion
$pos        = count($cadena)-1;
$ext        = $cadena[$pos];                    //Extension

$dir        = "archivos/";                      //Carpeta donde se guardan los archivos
$file_enc   = md5_file($archivo);              //Nombre del archivo encriptado
//$passEnc    = md5($pass);

if($archivo_n != ''){
        $fileName1 = "$file_enc.$ext";
        copy($archivo, $dir.$fileName1);       //copy(origen, destino)
                                                //copy(<ruta del archivo>, <nueva direccion del archivo>)
    }

$sql = "INSERT INTO banners
        (nombre, archivo_n, archivo) 
        VALUES ('$nombre', '$archivo_n', '$fileName1')";
$res = $con->query($sql);  //Ejecuta la consulta que se hace en la linea 16

header("LOCATION: banners.php");
?>