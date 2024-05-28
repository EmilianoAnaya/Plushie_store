<?php
session_start();
$id_cliente = $_SESSION['idU'];

require "funciones/conecta.php";
$con = conecta();

//RECIBE VARIABLES
$id_producto = $_REQUEST["idP"];
$cantidad    = $_REQUEST['cantidad'];

//Obtener id_pedido //UN CLIENTE SOLO PUEDE TENER UN PEDIDO A LA VEZ
$sql = "SELECT * FROM pedidos
        WHERE id_cliente = $id_cliente AND status = 0";
$res = $con->query($sql);
$num = $res->num_rows;
if($num == 0)
{
    $fecha = date('Y-m-d H:i:s'); //05-05-2023 12:16:45
    $sql = "INSERT INTO pedidos(fecha, id_cliente)
            VALUES ('$fecha', '$id_cliente')";
    $res = $con->query($sql);
    $id_pedido = $con->insert_id;
}else{
    $row        = $res->fetch_assoc();
    $id_pedido  = $row['id'];
    $fecha      = $row["fecha"];
}

//Obtener precio
$sql    = "SELECT costo FROM productos WHERE id = $id_producto";
$res    = $con->query($sql);
$row    = $res->fetch_assoc();
$costo  = $row["costo"];

//Verfico si producto existe para este pedido
$sql ="SELECT * FROM pedidos_productos
        WHERE id_producto = $id_producto AND id_pedido=$id_pedido";
$res = $con->query($sql);
$num = $res->num_rows;
if($num == 0)
{
//Insertar producto
$sql = "INSERT INTO pedidos_productos
        (id_pedido, id_producto, cantidad, costo)
        VALUES ($id_pedido, $id_producto, $cantidad, $costo)";
}else{
    $row  = $res->fetch_assoc();
    $idPP = $row['id'];
    $sql = "UPDATE pedidos_productos SET status = '1', cantidad = cantidad + $cantidad
            WHERE id=$idPP";
}
$res = $con->query($sql);

$ban = 1;
echo $ban;
?>