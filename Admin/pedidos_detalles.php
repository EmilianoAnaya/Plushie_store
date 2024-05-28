<?php
ini_set('display_errors', 0);
session_start();
$nombre = $_SESSION['nombre'];

if($nombre == '')
{
    header("Location: index.php");
}

require "funciones/conecta.php";
$con = conecta();  //conexión

$id  = $_REQUEST['id'];

$sql    = "SELECT * FROM pedidos_productos WHERE id_pedido='$id'";
$res    = $con->query($sql);

?>

<html>

    <head>
        <title>Detalles Pedido</title>
    </head>

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
        width: 400px;
        height: 500px auto;
        grid-template-rows: 25px;
    }

    .caja
    {
        display: grid;
        border: 1px solid black;
        grid-template-columns: 100px 100px 100px 100px;
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

    .caja-c1
    {
        grid-columns: 1/5;
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

    <body>
        <?php
            echo "<div class='menu'>";
                echo "<a class=btn href=\"inicio.php\">INICIO</a>";
                echo "<a class=btn href=\"empleados_lista.php\">EMPLEADOS</a>";
                echo "<a class=btn href=\"productos.php\">PRODUCTOS</a>";
                echo "<a class=btn href=\"banners.php\">BANNERS</a>";
                echo "<a class=btn href=\"pedidos.php\">PEDIDOS</a>";
                echo "<a class=btn href=\"bienvenido.php\">BIENVENIDO USER</a>";
                echo "<a class=btn href=\"cerrar_sesion.php\">CERRAR SESION</a>";
            echo "</div><br>";
        ?>
        <div class="layout">
        <div class="caja">
            <div class="c1">ID Producto</div>
            <div class="c1">Cantidad</div>
            <div class="c1">Costo Unitario</div>
            <div class="c1">Subtotal</div>
        </div>
        <?php
        while($row = $res->fetch_array()) {  //fetch_array toma fila por fila
            $id_producto        = $row["id_producto"];
            $cantidad           = $row["cantidad"];
            $costo              = $row["costo"];
            $subtotal = $cantidad * $costo;
            $total    += $subtotal;
        ?>
        <div class = "caja">
            <div class="c2"><?php echo "$id_producto"?></div>
            <div class="c2"><?php echo "$cantidad"?></div>
            <div class="c2"><?php echo "$costo" ?></div>
            <div class="c2"><?php echo "$subtotal" ?></div>
        </div>
    <?php } ?>
        <div class = "caja-c1">
            <div class="c2">Precio Total: <?php echo "$total"?></div>
        </div>
        <?php echo '<div>'."<a href=\"pedidos.php\" class='bt'>Regresar al listado de pedidos</a>".'</div>'; ?>
        </div>
    </body>

</html>