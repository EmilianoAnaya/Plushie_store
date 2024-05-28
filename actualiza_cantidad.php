<?php
//elimina.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$id         = $_REQUEST['id'];
$cantidad   = $_REQUEST['cantidad'];

//$sql = "DELETE FROM empleados WHERE id = $id";
$sql = "UPDATE pedidos_productos SET cantidad='$cantidad' WHERE id_producto='$id'";
$con->query($sql);


header("LOCATION: carrito01.php");
?>