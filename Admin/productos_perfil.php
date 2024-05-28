<?php
session_start();
$nombre = $_SESSION['nombre'];

if($nombre == '')
{
    header("Location: index.php");
}

require "funciones/conecta.php";
$con = conecta();  //conexión

$id  = $_REQUEST['id'];

$sql    = "SELECT * FROM productos WHERE id='$id'";
$res    = $con->query($sql);
$filas  = $res->num_rows;

$row = $res->fetch_assoc();
$nombre       = $row['nombre'];
$costo        = $row['costo'];
$codigo       = $row['codigo'];
$descripcion  = $row['descripcion'];
$stock        = $row['stock'];
$archivo      = $row["archivo"];
?>

<html>

    <head>
        <title>Detalles Productos</title>
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

        .layout
        {
            display: grid;
            width: 970px;
            height: 100px;
            border: 1px solid black;
            grid-template-columns: 300px 100px 200px 300px 70px;
            grid-template-rows: 25px;
            margin: -200px -415px -100px;
            top: 50%;
            left: 45%;
            position: absolute;
        }

        .caja
        {
            border: 1px solid black;
            background-color: #6e9deb;
            text-align: center;
        }

        .c1
        {
            background-color: #F6F7EC;
            padding: 20px;
        }

        .btn
        {
            background-color: #F6F7D8;
            border-radius: 5px;
            border: 1px solid black; 
            padding: 5px;
        }

        .b1
        {
            grid-column: 1/6;
            border: 1px solid black;
        }

        .foto
        {
            background-color: #F6F7EC;
        }

        .bt
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
    </style>

    <body>
        <?php
            echo "<div class='menu'>";
                echo "<a class=bt href=\"inicio.php\">INICIO</a>";
                echo "<a class=bt href=\"empleados_lista.php\">EMPLEADOS</a>";
                echo "<a class=bt href=\"productos.php\">PRODUCTOS</a>";
                echo "<a class=bt href=\"banners.php\">BANNERS</a>";
                echo "<a class=bt href=\"pedidos.php\">PEDIDOS</a>";
                echo "<a class=bt href=\"bienvenido.php\">BIENVENIDO USER</a>";
                echo "<a class=bt href=\"cerrar_sesion.php\">CERRAR SESION</a>";
            echo "</div><br>";
        ?>
        <div class='layout'>
            <div class="caja">Nombre</div>
            <div class="caja">Costo</div>
            <div class="caja">Código</div>
            <div class="caja">Descripción</div>
            <div class="caja">Stock</div>
            <?php
            echo '<div class="caja c1">'."$nombre".'</div>';
            echo '<div class="caja c1">'.$costo.'</div>';
            echo '<div class="caja c1">'.$codigo.'</div>';
            echo '<div class="caja c1">'.$descripcion.'</div>';
            echo '<div class="caja c1">'.$stock.'</div>';
            ?>
            <div class="caja b1">Foto de Perfil</div>
            <?php
            echo '<div class="caja b1 foto">'."<img width= '200' height= '200' src=\"archivos/$archivo\">".'</div>';
            echo '<div>'."<a href=\"productos.php\" class='btn'>Regresar al listado de productos</a>".'</div>';
            ?>
        </div>
    </body>

</html>