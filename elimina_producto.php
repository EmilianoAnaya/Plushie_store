<?php
//elimina.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$id  = $_REQUEST['id'];

//$sql = "DELETE FROM empleados WHERE id = $id";
$sql = "UPDATE pedidos_productos SET status = '0', cantidad = '0' WHERE id_producto = $id";
$con->query($sql);

header("LOCATION: carrito01.php");
?>