<?php
//salva.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$id           = $_REQUEST['id'];
$nombre       = $_REQUEST['nombre'];
$apellidos    = $_REQUEST['apellidos'];
$correo       = $_REQUEST['correo'];
$pass         = $_REQUEST['pass'];
$rol          = $_REQUEST['rol'];
$archivo_n    = $_FILES['archivo']['name'];
$archivo      = $_FILES['archivo']['tmp_name'];
$passEnc      = md5($pass);

if($archivo_n != '')
{
$cadena     = explode(".",$archivo_n);          //Separa el nombre para obtener la expresion
$pos        = count($cadena)-1;
$ext        = $cadena[$pos];                    //Extension

$dir        = "archivos/";                      //Carpeta donde se guardan los archivos
$file_enc   = md5_file($archivo);              //Nombre del archivo encriptado
}

if($archivo_n != ''){
        $fileName1 = "$file_enc.$ext";
        copy($archivo, $dir.$fileName1);       //copy(origen, destino)
                                                //copy(<ruta del archivo>, <nueva direccion del archivo>)
    }

$is_pass        = $pass== '' ? "" : "pass='$passEnc',";
$is_archivo_n   = $archivo_n== '' ? "" : "archivo_n='$archivo_n',";
if($archivo_n != ''){
        $is_archivo = $fileName1== '' ? "" : "archivo='$fileName1',";
}else{
        $is_archivo = '';
}
$sql = "UPDATE empleados SET nombre='$nombre', apellidos='$apellidos', correo='$correo',
        $is_pass  $is_archivo_n $is_archivo rol='$rol' WHERE id='$id'";
$res = $con->query($sql);  

header("LOCATION: empleados_lista.php");
?>