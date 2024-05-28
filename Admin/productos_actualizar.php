<?php
//salva.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$id           = $_REQUEST['id'];
$nombre       = $_REQUEST['nombre'];
$costo        = $_REQUEST['costo'];
$codigo       = $_REQUEST['codigo'];
$descripcion  = $_REQUEST['descripcion'];
$stock        = $_REQUEST['stock'];
$archivo_n    = $_FILES['archivo']['name'];
$archivo      = $_FILES['archivo']['tmp_name'];

if($archivo_n != '')
{
$cadena     = explode(".",$archivo_n);          //Separa el nombre para obtener la expresion
$pos        = count($cadena)-1;
$ext        = $cadena[$pos];                    //Extension

$dir        = "archivos/";                      //Carpeta donde se guardan los archivos
$file_enc   = md5_file($archivo);              //Nombre del archivo encriptado
}
//$passEnc    = md5($pass);

if($archivo_n != ''){
        $fileName1 = "$file_enc.$ext";
        copy($archivo, $dir.$fileName1);       //copy(origen, destino)
                                                //copy(<ruta del archivo>, <nueva direccion del archivo>)
    }

$is_archivo_n   = $archivo_n== '' ? "" : "archivo_n='$archivo_n',";
if($archivo_n != ''){
        $is_archivo = $fileName1== '' ? "" : "archivo='$fileName1',";
}else{
        $is_archivo = '';
}
$sql = "UPDATE productos SET nombre='$nombre', codigo='$codigo', descripcion='$descripcion',
        costo='$costo', $is_archivo_n $is_archivo stock='$stock' WHERE id='$id'";
$res = $con->query($sql);  //Ejecuta la consulta que se hace en la linea 16

header("LOCATION: productos.php");
?>