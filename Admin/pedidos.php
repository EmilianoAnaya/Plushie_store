<?php
session_start();
$nombre = $_SESSION['nombre'];
if($nombre == '')
{
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>PEDIDOS</title>
        <style>
            body
        {
            background-image: url("http://drive.google.com/uc?export=view&id=1br8nIVyCruGjbFfzboepeiZ7W94j3cYl");
            background-repeat:no-repeat;
            background-position-x:center;
            background-position-y:center;
            background-size: cover;
        }


        .btn
        {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 18px;
            background: #1E90FF;
            border-radius: 25px;
            padding: 20px;
            color: #fff;
            text-decoration: none;
            text-align: center;
        }

        .menu
        {
            display: grid;
            grid-template-columns: 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571%;
            margin-top: 60px;
        }

        .b1
        {
            background-color: #1EC4F0;
            -webkit-touch-callout: none; 
            -webkit-user-select: none; 
            -khtml-user-select: none; 
            -moz-user-select: none; 
            -ms-user-select: none; 
            user-select: none; 
        }

    .layout
    {
        display: grid;
        width: 550px;
        height: 500px auto;
        grid-template-rows: 25px;
    }

    .caja
    {
        display: grid;
        border: 1px solid black;
        grid-template-columns: 50px 100px 100px 100px 100px 100px;
    }

    .c1
    {
        border: 1px solid black;
        background-color: #81ebff;
        text-align: center;
    }

    .c2
    {
        border: 1px solid black;
        background-color: #F6F7EC;
        text-align: center;
        font-size: 20px;
    }

    .bt
    {
        background-color: #F6F7D8;
        border-radius: 5px;
        border: 1px solid black;   
        text-decoration: none; 
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 18px;
        -webkit-touch-callout: none; 
            -webkit-user-select: none; 
            -khtml-user-select: none; 
            -moz-user-select: none; 
            -ms-user-select: none; 
            user-select: none;
    }

    .s1
    {
        padding: 5px;
    }
        </style>
    </head>
</html>

<?php

    echo "<div class='menu'>";
        echo "<a class=btn href=\"inicio.php\">INICIO</a>";
        echo "<a class=btn href=\"empleados_lista.php\">EMPLEADOS</a>";
        echo "<a class=btn href=\"productos.php\">PRODUCTOS</a>";
        echo "<a class=btn href=\"banners.php\">BANNERS</a>";
        echo "<a class='btn b1'>PEDIDOS</a>";
        echo "<a class='btn' href=\"bienvenido.php\">BIENVENIDO USER</a>";
        echo "<a class=btn href=\"cerrar_sesion.php\">CERRAR SESION</a>";
    echo "</div>";

    require "funciones/conecta.php";  //Hace un include
    $con = conecta();  //conexión

    $sql     = "SELECT * FROM pedidos WHERE status = 1";  //Consulta  (Asterisco * todas las columnas) , where condiciona, FROM tabla
    $res     = $con->query($sql);   //Le asigna la base de datos en forma de tabla
    $filas   = $res->num_rows;

?>

<div class="layout">
    <div class="caja">
        <div class="c1">ID</div>
        <div class="c1">Fecha</div>
        <div class="c1">ID Cliente</div>
        <div class="c1">Cantidad</div>
        <div class="c1">Costo Total</div>
        <div class="c1">Ver Detalle</div>
    </div>
<?php
while($row = $res->fetch_array()) {  //fetch_array toma fila por fila
    $id                 = $row["id"];
    $fecha              = $row["fecha"];
    $ID_cliente         = $row["id_cliente"];
    $Cantidad_Productos = $row["cantidad_productos"];
    $Costo_Total        = $row["costo"]
     ?>
    <div class = "caja" id="reg<?php echo $row["id"]?>">
        <div class="c2"><?php echo "$id"?></div>
        <div class="c2"><?php echo "$fecha"?></div>
        <div class="c2"><?php echo "$ID_cliente" ?></div>
        <div class="c2"><?php echo "$Cantidad_Productos" ?></div>
        <div class="c2"><?php echo "$Costo_Total" ?></div>
        <div class="c2"><a <?php echo "href=\"pedidos_detalles.php?id=$id?\""?> class='bt'>Ver Detalle</a></div>
    </div>
    <?php } ?>
</div>