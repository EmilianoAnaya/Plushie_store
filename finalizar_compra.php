<?php
require "funciones/conecta.php";
$con = conecta();


$total          = $_REQUEST["total"];
$cantidad_tot   = $_REQUEST['cantidad_tot'];
$idU            = $_REQUEST['idU'];

$sql_pedidos = "SELECT id FROM pedidos WHERE id_cliente = $idU";
$res_pedidos = $con->query($sql_pedidos);
$num = mysqli_num_rows($res_pedidos);
$idP = $num;

echo $idP;

$sql = "UPDATE pedidos SET cantidad_productos='$cantidad_tot', costo='$total', status='1' WHERE id = $idP AND id_cliente = $idU";
$con->query($sql);

$sql_pedidos = "UPDATE pedidos_productos SET status='0' WHERE id_pedido='$idP'";
$con->query($sql_pedidos);

header("LOCATION: carrito.php");
?>