<?php
//elimina.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$id  = $_REQUEST['id'];

//$sql = "DELETE FROM empleados WHERE id = $id";
$sql = "UPDATE empleados SET eliminado = 1 WHERE id = $id";
$con->query($sql);

header("LOCATION: empleados_lista.php");
?>